<?php

use App\Http\Controllers\CopyTraderController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StakingController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('markets/t/{type}', [MarketController::class, 'index'])->name('markets.index');
    Route::resource('markets', MarketController::class)->parameters(['markets' => 'asset'])->except('index');
    Route::resource('stakes', StakingController::class);
    Route::resource('traders', CopyTraderController::class);
    Route::resource('subscriptions', SubscriptionController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
