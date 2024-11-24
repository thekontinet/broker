<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.index', [
            'subscriptions' => Subscription::query()->limit(50)->get(),
        ]);
    }
}
