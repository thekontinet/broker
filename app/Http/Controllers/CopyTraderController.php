<?php

namespace App\Http\Controllers;

use App\Enums\AssetTypeEnum;
use App\Models\CopyTrader;
use Illuminate\Http\Request;

class CopyTraderController extends Controller
{
    public function index(Request $request)
    {
        $query = CopyTrader::query();
        $filter = $request->get('filter', 'followers');

        if (in_array($filter, ['followers', 'average_PnL'])) {
            $query->orderBy($filter, 'desc');
        } elseif (in_array($filter, array_column(AssetTypeEnum::cases(), 'value'))) {
            // dd($filter);
            $query->where('specialization', $filter);
        } else {
            // dd(vars: gettype($filter));
            $query->where('trading_style', $filter);
        }

        // dd($query->limit(50)->get());

        return view("trader.index", [
            "traders" => $query->limit(50)->get(),
            "query" => $filter
        ]);
    }

    public function show(CopyTrader $trader)
    {
        return view("trader.show", [
            "trader" => $trader
        ]);
    }
}
