<?php

namespace App\Http\Controllers;

use App\Enums\AssetTypeEnum;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function index(AssetTypeEnum $type, Request $request)
    {
        if ($symbol = $this->getSymbolFromTradingViewWidgetSymbol($request->query('tvwidgetsymbol'))) {
            $asset = Asset::active()->where('type', $type)->where('symbol', $symbol)->firstOrFail();

            return redirect()->route('markets.show', $asset);
        }

        return view('market.index', [
            'assets' => Asset::active()->where('type', $type)->whereNotIn('symbol', ['usdt', 'usdc'])->limit(50)->get(),
        ]);
    }

    public function show(Asset $asset, Request $request)
    {
        return view('market.show', [
            'asset' => $asset,
            'orders' => $request->user()->orders()->latest()->running()->limit(20)->get(),
            'symbol' => strtoupper($asset->symbol).'USDT',
            'wallet' => Auth::user()->wallet,
        ]);
    }

    private function getSymbolFromTradingViewWidgetSymbol($symbol)
    {
        preg_match('/(.*?):(.*?)(USDT|USD)/i', $symbol, $matches);

        // Check if a match was found
        if (! empty($matches[2])) {
            return $matches[2];
        }

        return null;
    }
}
