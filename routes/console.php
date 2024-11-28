<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('assets:sync', function (\App\Services\MarketData\MarketDataService $marketDataService) {
    $this->info("Fetching market data from service");
    $marketList = $marketDataService->getMarketList();

    $this->info("syncing assets to database");

    $marketList->each(function ($marketData) {
        \App\Models\Asset::query()->updateOrCreate([
            'uid' => $marketData['id'],
            'type' => 'crypto',
        ], [
            'name' => $marketData['name'],
            'precision' => config("money.currencies." . strtoupper($marketData['symbol']) . ".precision", 2),
            'symbol' => $marketData['symbol'],
            'meta' => $marketData['meta'],
        ]);
    });

    $this->info("syncing complete successfully");
})->purpose('to sync asset market data to database');
