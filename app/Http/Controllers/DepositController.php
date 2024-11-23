<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Internal\Exceptions\ExceptionInterface;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepositController extends Controller
{
    public function create()
    {
        return view('deposit.create', [
            'assets' => Asset::query()->whereNotNull('meta->wallet_address')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency' => ['required', Rule::exists('assets', 'id')],
            'amount' => ['required'],
        ]);

        $asset = Asset::query()->find($request->currency);
        /** @var User $user */
        $user = Auth::user();

        // Get user wallet or create if user doest have wallet for this asset
        /** @var Wallet $wallet */
        $wallet =  $user->getWallet($asset->symbol) ?? Auth::user()->createWallet([
            'name' => $asset->name,
            'slug' => $asset->symbol,
            'decimal_places' => $asset->precision,
            'meta' => ['currency' => $asset->symbol],
        ]);

        // Deposit into wallet
        try {
            $wallet->depositFloat(abs($request->input('amount')), ['description' => "Deposit " . strtoupper($asset->symbol)], false);
            return redirect(route('wallets.index'));
        } catch (ExceptionInterface $e) {
            return redirect()->back()->withErrors(['amount' => "Depoit failed: " . $e->getMessage()]);
        }
    }
}
