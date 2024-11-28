<?php

namespace App\Services\MarketData;

use App\Models\Asset;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
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

    public function getPrice(string $id): float
    {
        $prices = $this->getMarketInfo();
        return $prices[$id]['current_price'];
    }

    public function getMarketInfo()
    {
        $coinIdsCollection = Asset::query()->pluck('uid');
        $ids = $coinIdsCollection->join(',');
        $key = md5($ids);
        $data =  Cache::remember("coin-market-$key", now()->addMinute(), function () use ($ids) {
            $response = Http::get("https://api.coingecko.com/api/v3/coins/markets?ids=$ids&vs_currency=USD");
            $response->throw();
            return $response->json();
        });

        return collect($data)->reduce(function($acc, $data){
            $acc[$data['id']] = $data;
            return $acc;
        }, []);
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
