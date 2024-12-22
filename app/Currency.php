<?php

namespace App;

use App\Services\MarketData\MarketDataService;
use Illuminate\Support\Facades\Cache;

class Currency
{
    /**
     * This method overrides the getCurrencies() method of \Akaunting\Money\Currency::getCurrencies()
     * This will help the money helper to format crypto money
     * @return array
     */
    public static function getCurrencies(): array
    {
        $key = 'cached-currencies-' . md5(json_encode(config('money.currencies')));
        $currencies = Cache::remember($key, now()->addMonth(), function () {
            $data = app(MarketDataService::class)->getMarketList();
            $currencies = [];
            foreach ($data as $currency) {
                $currencies[strtoupper($currency['symbol'])] =  [
                    'name'                => $currency['name'],
                    'code'                => 0,
                    'precision'           => 8,
                    'subunit'             => 100000000,
                    'symbol'              => strtoupper($currency['symbol']),
                    'symbol_first'        => false,
                    'decimal_mark'        => '.',
                    'thousands_separator' => ',',
                ];
            }

            return array_merge($currencies, \Akaunting\Money\Currency::getCurrencies());
        });

        \Akaunting\Money\Currency::setCurrencies($currencies);

        return $currencies;
    }
}
