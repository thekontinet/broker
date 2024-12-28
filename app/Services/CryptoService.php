<?php

namespace App\Services;

use App\Api\CoingeckoApi;
use App\Models\Currency;

class CryptoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CoingeckoApi $api)
    {
        //
    }

    public function getMarketDataByIds(array $ids = [])
    {
        $marketData =  $this->api->getCoinList($ids);
        return array_reduce($marketData, function ($value, $data) {
            $value[$data['id']] = $data;
            return $value;
        }, []);
    }
}
