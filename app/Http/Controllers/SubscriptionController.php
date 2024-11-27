<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\WalletService;
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
                ->confirmed(true)
                ->description('New subscription')
                ->execute($user);

            /** @var Subscription $subscription */
            $subscription = $user->subscription()->firstOrCreate([
                "plan_id" => $plan->id,
                "end_date" => now()->addDays($plan->duration),
            ], ['profit' => 0]);

            $subscription->deposit($amount);

            return redirect()->route('dashboard')->with('success', 'subscribed successfully');
        } catch (TransactionError $e) {
            return back()->with(["error" => $e->getMessage()]);
        }
    }
}
