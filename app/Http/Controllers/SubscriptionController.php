<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\WalletService;
use Bavix\Wallet\Internal\Exceptions\ExceptionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct(private WalletService $walletService) {}

    public function store(Request $request)
    {
        $plan = Plan::query()->findOrFail($request->get('plan_id'));
        $request->validate([
            "amount" => ["required", 'numeric', "min:$plan->min_amount"],
            "plan_id" => ["required", "exists:plans,id"],
        ]);

        $amount = $request->get('amount');
        /** @var User $user */
        $user = Auth::user();

        try {
            $this->walletService
                ->withdraw($amount)
                ->description('New subscription')
                ->execute($user);

            /** @var Subscription $subscription */
            $subscription = $user->subscription()->firstOrCreate([
                "plan_id" => $plan->id,
            ], ['profit' => 0, "end_date" => now()->addDays($plan->duration),]);

            $subscription->deposit($amount);

            return redirect()->route('dashboard')->with('success', 'subscribed successfully');
        } catch (TransactionError $e) {
            return back()->with(["error" => $e->getMessage()]);
        } catch (ExceptionInterface $e) {
            return back()->with(["error" => $e->getMessage()]);
        }
    }

    public function destroy(Subscription $subscription, Request $request)
    {
        if(!$subscription->end_date->isPast()) {
            return back()->with(['error' => "You withdraw trade until after " . now()->fromNow()]);
        }

        try {
            $this->walletService
                ->deposit($subscription->total)
                ->description('Trade withdrawal')
                ->execute($request->user());

            $subscription->delete();

            return redirect()->route('dashboard')->with('success', 'Withdrawn successfully');
        } catch (TransactionError $e) {
            return back()->with(["error" => $e->getMessage()]);
        }
    }
}
