<?php

namespace App\Http\Controllers;

use App\Enums\AssetTypeEnum;
use App\Models\Asset;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index(AssetTypeEnum $type)
    {
        return view('market.index', [
            'assets' => Asset::active()->where('type', $type)->limit(50)->get()
        ]);
    }

    public function show(Asset $asset)
    {
        return view('market.show', [
            'asset' => $asset
        ]);
    }
}
