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

    public function getCoinList(array $ids = [])
    {
        $ids = implode(',', $ids);
        $response = Http::get("https://api.coingecko.com/api/v3/coins/markets?vs_currency=USD&ids=$ids");
        return $response->json();
    }
}
