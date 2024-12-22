<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TokenSwapController extends Controller
{
    public function __construct(private WalletService $walletService){}

    public function create(Request $request)
    {
        if(!$symbol = $request->query('symbol')) throw new NotFoundHttpException();
        return view('wallet.swap', [
            'assets' => Asset::active()->whereNot('symbol', $symbol)->paginate(),
            'asset' => Asset::query()->where('symbol', $symbol)->firstOrFail(),
            'wallet' => $request->user()->getWallet($symbol),
        ]);
    }

    public function store(Request $request)
    {
        // Step 1: Validate the input
        $validatedData = $request->validate([
            'from' => ['required', 'string', 'exists:assets,symbol'],
            'to' => ['required', 'string', 'exists:assets,symbol', 'different:from'],
            'amount' => ['required', 'numeric', 'min:0.0001'],
        ]);

        // Retrieve the assets from the database
        $fromAsset = Asset::query()->where('symbol', $validatedData['from'])->first();
        $toAsset = Asset::query()->where('symbol', $validatedData['to'])->first();

        // Calculate the value of the `from` asset in USD
        $fromPriceInUSD = $fromAsset->price * $validatedData['amount'];

        // Step 5: Calculate the equivalent amount of the `to` asset
        if ($toAsset->price <= 0) {
            return response()->json(['error' => 'Invalid price for target asset.'], 400);
        }
        $toAmount = $fromPriceInUSD / $toAsset->price;

        // Step 6: Withdraw the `from` asset
        $this->walletService->withdraw(
            $validatedData['amount'],
            $fromAsset->symbol
        )->execute($request->user());

        // Step 7: Deposit the equivalent `to` asset
        $this->walletService->deposit(
            $toAmount,
            $toAsset->symbol
        )->description("Transfer from $fromAsset->symbol")->execute($request->user());

        // Step 8: Return a success response
        return redirect()->route('wallets.index');
    }

}
