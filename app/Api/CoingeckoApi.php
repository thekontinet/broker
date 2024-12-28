<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class CoingeckoApi
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCoinList(array $ids = [], string $currency = 'USD'): array
    {
        $idsString = implode(',', $ids);
        $queryArray = ['vs_currency' => $currency];

        if(count($ids)){
            $queryArray['ids'] = $idsString;
        }

        $query = http_build_query($queryArray);

        return Http::withoutVerifying()
            ->get("https://api.coingecko.com/api/v3/coins/markets?$query")
            ->throw()
            ->json();
    }
}
