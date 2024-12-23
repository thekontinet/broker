<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        return view('wallet.index', [
            'wallets' => Auth::user()->wallets,
            'transactions' => Auth::user()->transactions()->latest()->paginate(),
        ]);
    }

    public function show(Wallet $wallet, Request $request)
    {
        abort_if($wallet->holder()->isNot($request->user()), 403);

        return view('wallet.show', [
            'wallet' => $wallet,
            'transactions' => $wallet->walletTransactions()->latest()->paginate(),
        ]);
    }
}
