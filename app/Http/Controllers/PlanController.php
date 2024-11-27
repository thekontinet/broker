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
    public function index()
    {
        return view('plan.index', [
            'plans' => Plan::query()->paginate(),
        ]);
    }
}
