<?php

namespace App\Services\MarketData;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class MarketDataService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getPrice(string $currency, string $market)
    {
        $response = Http::get("https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_DAILY&symbol=BTC&market=EUR&apikey=demo");
        return $response->json("Time Series (Digital Currency Daily)");
    }

    public function getMarketList(): Collection
    {
        $response = Http::withoutVerifying()->get("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd");
        return $response->collect()->map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'symbol' => $item['symbol'],
                'meta' => [
                    'currency' => 'USD',
                    'price' => $item['current_price'],
                    'image' => $item['image'],
                ],
            ];
        });
    }
}
