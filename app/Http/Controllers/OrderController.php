<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Exceptions\TransactionError;
use App\Models\Asset;
use App\Models\Order;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct(private WalletService $walletService) {}

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => ['required', Rule::exists('assets', 'id')->where('active', true)],
            'trade' => ['required', 'string', 'in:limit,market'],
            'price' => ['required_if:trade,limit', 'numeric', 'min:1'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000'],
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

        if ($request->input('trade') === 'market') {
            $data['status'] = 'active';
        }

        try {
            $this->walletService->withdraw($request->input('amount'))
                ->description("Open $request->type order")
                ->execute($request->user());

            Order::query()->create($data);

            return redirect()->back()->with('success', 'Order placed successfully');
        } catch (TransactionError $exception) {
            return redirect()->back()->withErrors('amount', 'Order cannot be placed: '.$exception->getMessage());
        }
    }

    public function destroy(Order $order, Request $request)
    {
        try {
            $order->update(['status' => OrderStatus::COMPLETED]);
            $total = $order->quantity * $order->asset->price;

            $this->walletService->deposit($total)
                ->description("Open $request->type order")
                ->execute($request->user());

            return redirect()->back()->with('success', 'Order has been closed');
        } catch (TransactionError $exception) {
            return redirect()->back()->with('error', 'Order cannot be closed: '.$exception->getMessage());
        }
    }
}
