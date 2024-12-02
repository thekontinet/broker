<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Asset;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WithdrawController extends Controller
{
    public function __construct(private WalletService $walletService)
    {

    }

    public function create()
    {
        return view('withdraw.create', [
            'assets' => Asset::query()->whereNotNull('meta->wallet_address')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency' => [
                'required',
                Rule::exists('assets', 'symbol')
                    ->where('active', true)
                    ->whereNotNull('meta->wallet_address')
            ],
            'amount' => ['required'],
            'address' => ['required'],
        ]);

        // Withdraw from wallet
        try {
            $transaction = $this->walletService->withdraw($request->input('amount'), $request->input('currency'))
                ->description("Withdraw " . strtoupper($request->input('currency')))
                ->confirmed(false)
                ->with('wallet_address', $request->input('address'))
                ->execute($request->user());

            return redirect(route('wallets.show', $transaction->wallet));
        } catch (TransactionError $e) {
            return redirect()->back()->withErrors(['amount' => $e->getMessage()]);
        }
    }
}
