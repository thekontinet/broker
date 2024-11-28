<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CopyTraderController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StakingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/terms', [TermsController::class, 'index'])->name('terms_and_conditions');
Route::get('/policy', [PolicyController::class, 'index'])->name('policy');

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
    Route::resource('traders', CopyTraderController::class);
    Route::resource('plans', PlanController::class)->only('index');
    Route::resource('subscriptions', SubscriptionController::class)->only('store', 'destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
