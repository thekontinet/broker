<?php

namespace App\Http\Controllers;

use App\Models\CopyTrader;
use Illuminate\Http\Request;

class CopyTraderController extends Controller
{
    public function index(Request $request)
    {
        $query = CopyTrader::query();
        $filter = $request->get('filter', 'followers');

        if ($filter === 'followers') {
            $query->orderBy('followers', 'desc');
        } else {
            $query->orderBy('average_PnL', 'desc');
        }

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
