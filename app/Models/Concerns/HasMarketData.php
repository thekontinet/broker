<?php

namespace App\Models\Concerns;

use App\Services\MarketData\MarketDataService;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasMarketData
{
    public function price(): Attribute
    {
        try {
            $marketDataService = resolve(MarketDataService::class);

            return new Attribute(
                get: fn () => $marketDataService->getPrice($this->uid)
            );
        } catch (\Exception $exception) {
            logger($exception);

            return new Attribute(
                get: fn () => null
            );
        }
    }

    public function priceChangePercentage24h(): Attribute
    {
        $marketDataService = resolve(MarketDataService::class);

        return new Attribute(
            get: fn () => $marketDataService->getMarketInfo()[$this->uid]['price_change_percentage_24h'] ?? null
        );
    }
}
