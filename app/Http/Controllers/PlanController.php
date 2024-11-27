<?php

namespace App\Http\Controllers;

use App\Exceptions\TransactionError;
use App\Models\Plan;
use App\Models\Subscription;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function __construct(private WalletService $walletService) {}

    public function index()
    {
        return view('plan.index', [
            'plans' => Plan::query()->limit(50)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "amount" => ["required"],
            "plan_id" => ["required", "exists:plans,id"],
        ]);

        try {
            $data["user_id"] = Auth::id();

            $this->walletService
                ->withdraw($data['amount'])
                ->confirmed(true)
                ->description('plan subscription')
                ->execute($request->user());

            Subscription::query()->create($data);    

            return redirect()->route('plans.index')->with('success', 'subscribed successfully');    
        } catch (TransactionError $e) {
            return back()->withErrors(["amount", $e->getMessage()]);
        };
    }
}
