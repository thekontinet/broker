<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        return view('dashboard', [
            'wallets' => $user->wallets,
            'user' => $user,
            'assets' => Asset::query()->active()->whereNot('symbol', 'usdt')->get()
        ]);
    }
}
