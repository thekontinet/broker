<?php

use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StakingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('markets/t/{type}', [MarketController::class, 'index'])->name('markets.index');
    Route::resource('markets', MarketController::class)->parameters(['markets' => 'asset'])->only('show');
    Route::resource('orders', OrderController::class)->only(['destroy', 'store']);
    Route::resource('wallets', WalletController::class)->only(['index', 'show']);
    Route::resource('deposit', DepositController::class)->only(['create', 'store']);
    Route::resource('withdraw', WithdrawController::class)->only(['create', 'store']);
    Route::resource('staking', StakingController::class);
    Route::resource('traders', CopyTraderController::class);
    Route::resource('subscriptions', SubscriptionController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
