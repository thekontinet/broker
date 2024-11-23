<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Asset;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => ['required', Rule::exists('assets', 'id')->where('active', true)],
            'trade' => ['required', 'string', 'in:limit,market'],
            'price' => ['required_if:trade,limit', 'numeric', 'min:1'],
            'amount' => ['required', 'numeric', 'min:10'],
            'type' => ['required', 'string', 'in:buy,sell'],
        ]);

        $asset = Asset::query()->find($request->input('asset_id'));
        $price = $request->input('trade') === 'limit' ? $request->input('price') : $asset->price;

        $data = [
            'asset_id' => $asset->id,
            'user_id' => $request->user()->id,
            'type' => $request->input('type'),
            'price' => $price,
            'quantity' => $request->input('amount') / $price,
        ];

        if($request->input('trade') === 'market'){
            $data['status'] = 'active';
        }

        // TODO: validate users balance before executing order
        if(!$request->user()->wallet->canWithdrawFloat($request->input('amount')))
        {
            return redirect()->back()->withErrors(['amount' => 'balance is to low, please fund your wallet.']);
        }

        $request->user()->wallet->withdrawFloat($request->input('amount'));
        Order::query()->create($data);

        return redirect()->back()->with('success', 'Order placed successfully');
    }

    public function destroy(Order $order, Request $request)
    {
        $order->update(['status' => OrderStatus::COMPLETED]);
        $request->user()->wallet->depositFloat($order->quantity * $order->asset->price);
        return redirect()->back()->with('success', 'Order has been closed');
    }
}