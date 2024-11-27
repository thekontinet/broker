<?php

namespace App\Http\Controllers;

use App\Enums\AssetTypeEnum;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function index(AssetTypeEnum $type)
    {
        return view('market.index', [
            'assets' => Asset::active()->where('type', $type)->whereNotIn('symbol', ['usdt', 'usdc'])->limit(50)->get(),
        ]);
    }

    public function show(Asset $asset, Request $request)
    {
        return view('market.show', [
            'asset' => $asset,
            'orders' => $request->user()->orders()->latest()->running()->limit(20)->get(),
            'symbol' => strtoupper($asset->symbol) . 'USDT',
            'wallet' => Auth::user()->wallet
        ]);
    }
}
