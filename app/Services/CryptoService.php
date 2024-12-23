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

    public function Sync()
    {
        $supportedCryptos = collect(config('currencies.crypto'));
        $coins = $this->api->getCoinList($supportedCryptos->pluck('id')->toArray());

        foreach ($coins as $coin) {
            Currency::updateOrCreate(
                ['symbol' => $coin['symbol']],
                [
                    'name' => strtolower($coin['name']),
                    'type' => 'crypto',
                    'price' => $coin['current_price'],
                    'meta' => $coin,
                    'status' => false,
                ]
            );
        }
    }
}
