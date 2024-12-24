<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Asset;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepositController extends Controller
{
    public function __construct(
        private readonly WalletService $walletService,
    ) {}

    public function create()
    {
        return view('deposit.create', [
            'assets' => Asset::query()->fundable()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency' => [
                'required',
                Rule::exists('assets', 'symbol')
                    ->where('active', true)
                    ->whereNotNull('meta->wallet_address'),
            ],
            'amount' => ['required'],
        ]);

        // Deposit into wallet
        try {
            $transaction = $this->walletService->deposit($request->input('amount'), $request->input('currency'))
                ->description('Deposit '.strtoupper($request->input('currency')))
                ->confirmed(false)
                ->execute($request->user());

            return redirect(route('wallets.show', $transaction->wallet));
        } catch (TransactionError $e) {
            return redirect()->back()->withErrors(['amount' => $e->getMessage()]);
        }
    }
}
