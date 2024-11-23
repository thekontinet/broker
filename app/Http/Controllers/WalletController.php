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
            'wallets' => Auth::user()->wallets
        ]);
    }

    public function show(Wallet $wallet, Request $request)
    {
        abort_if($wallet->holder()->isNot($request->user()), 403);

        return view('wallet.show', [
            'wallet' => $wallet,
            'transactions' => $wallet->transactions()->latest()->paginate()
        ]);
    }
}
