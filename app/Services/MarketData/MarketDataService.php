<?php

namespace App\Services\MarketData;

use App\Models\Asset;
use App\Services\CryptoService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MarketDataService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CryptoService $provider)
    {
        //
    }

    public function getPrice(string $id, string $fiatCurrency = 'USD'): float
    {
        $prices = $this->getMarketInfo();

        return $prices[$id]['current_price'];
    }

    public function getMarketInfo()
    {
        $assetIds = Asset::query()->pluck('uid');
        $key = md5($assetIds->toJson());

        return Cache::remember(
            $key, 
            now()->addMinute(), 
            fn () => $this->provider->getMarketDataByIds($assetIds->toArray())
        );
    }

    public function getMarketList(): Collection
    {
        $marketData = $this->provider->getMarketDataByIds();

        return collect(array_map(function ($item) {
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
        }, $marketData));
    }
}
