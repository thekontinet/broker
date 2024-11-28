<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Asset;
use App\Models\User;
use App\Services\WalletService;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Internal\Exceptions\ExceptionInterface;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepositController extends Controller
{
    public function __construct(private WalletService $walletService)
    {

    }
    public function create()
    {
        return view('deposit.create', [
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
        ]);

        // Deposit into wallet
        try {
            $transaction = $this->walletService->deposit($request->input('amount'), $request->input('currency'))
                ->description("Deposit " . strtoupper($request->input('currency')))
                ->confirmed(false)
                ->execute($request->user());

            return redirect(route('wallets.show', $transaction->wallet));
        } catch (TransactionError $e) {
            return redirect()->back()->withErrors(['amount' => $e->getMessage()]);
        }
    }
}
