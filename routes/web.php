<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StakingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TokenSwapController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/page/{page}', [PageController::class, 'index'])->name('page');

Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('markets/t/{type}', [MarketController::class, 'index'])->name('markets.index');
    Route::resource('markets', MarketController::class)->parameters(['markets' => 'asset'])->only('show');
    Route::resource('orders', OrderController::class)->only(['destroy', 'store']);
    Route::resource('wallets', WalletController::class)->only(['index', 'show']);
    Route::resource('deposit', DepositController::class)->only(['create', 'store']);
    Route::resource('withdraw', WithdrawController::class)->only(['create', 'store']);
    Route::resource('stakes', StakingController::class)->only(['store', 'destroy']);
    Route::resource('pools', PoolController::class)->only('index');
    Route::resource('traders', TraderController::class)->only(['index', 'store', 'destroy']);
    Route::resource('plans', PlanController::class)->only('index');
    Route::resource('subscriptions', SubscriptionController::class)->only('store', 'destroy');
    Route::resource('swap', TokenSwapController::class)->only('create', 'store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
