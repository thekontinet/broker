<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Pool;
use App\Models\Stake;
use App\Services\WalletService;
use Illuminate\Http\Request;

class StakingController extends Controller
{

  public function __construct(private WalletService $walletService) {}

  public function store(Request $request)
  {
    $data = $request->validate([
      'amount' => ['required'],
      'pool_id' => ['required', 'exists:pools,id'],
    ]);

    $pool = Pool::query()->find($request->input('pool_id'));

    try {
      $this->walletService
      ->withdraw($request->input('amount'))
      ->confirmed(true)
      ->description("$pool->name staking")
      ->execute($request->user());
  
      $request->user()->stake($pool)->firstOrCreate([], [
        'amount' => 0,
        'pool_id' => $pool->id
      ])->increment('amount', $request->input('amount'));

      return redirect()->route('pools.index')->with('success', 'Staked successfully');
    } catch (TransactionError $e) {
      return back()->withErrors(['amount' => $e->getMessage()]);
    }
  }

  public function destroy(Request $request, Stake $stake)
  {

    if(!$stake->pool->end_date->isPast()){
      return back()->withErrors(['amount' => 'pool not ended']);
    }

    try {
      $this->walletService->deposit($stake->profit)
        ->confirmed(true)
        ->description("{$stake->pool->name} stake withdraw")
        ->execute($request->user());

      $stake->delete();

      return redirect()->route("pools.index")->with("success", "funds withdrawn successfully");
    } catch (TransactionError $e) {
      return back()->withErrors(["amount" => $e->getMessage()]);
    }
  }
}
