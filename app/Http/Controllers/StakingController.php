<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Pool;
use App\Models\Stake;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StakingController extends Controller
{
    public function __construct(private WalletService $walletService) {}

    public function store(Request $request)
    {
        $pool = Pool::query()->find($request->input('pool_id'));

        $request->validate([
            'amount' => ['required', 'numeric', "min:$pool->min_amount"],
            'pool_id' => ['required', Rule::exists('pools', 'id')],
        ], [
            'amount.min' => 'amount must be at least '.money($pool->min_amount, $pool->asset->symbol),
        ]);

        if (! $pool->isStakable()) {
            return back()->withErrors(['amount' => 'Pool is not yet available for staking']);
        }

        if ($pool->end_date->isPast()) {
            return back()->withErrors(['amount' => 'staking for this pool has ended']);
        }

        try {
            /**
             * Make sure the user debited wallet match the pool asset.
             * for example: if the pool asset is ethereum the user ethereum wallet will be debited
             */
            $this->walletService
                ->withdraw($request->input('amount'), $pool->asset->symbol)
                ->description("$pool->name staking")
                ->execute($request->user());

            $request->user()->stake($pool)->firstOrCreate([], [
                'amount' => 0,
                'pool_id' => $pool->id,
            ])->increment('amount', $request->input('amount'));

            return redirect()->route('pools.index')->with('success', 'Staked successfully');
        } catch (TransactionError $e) {
            return back()->withErrors(['amount' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, Stake $stake)
    {

        if (! $stake->pool->end_date->isPast()) {
            return back()->withErrors(['amount' => 'pool not ended']);
        }

        try {
            $this->walletService->deposit($stake->profit, $stake->pool->asset->symbol)
                ->description("{$stake->pool->name} stake withdraw")
                ->execute($request->user());

            $stake->delete();

            return redirect()->route('pools.index')->with('success', 'funds withdrawn successfully');
        } catch (TransactionError $e) {
            return back()->withErrors(['amount' => $e->getMessage()]);
        }
    }
}
