<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TraderController extends Controller
{
    public function index()
    {
//        /** @var Collection $t */
//        $t = Trader::first()->users;
//        $t->contains(re);
        return view('trader.index', [
            'traders' => Trader::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'trader_id' => ['required', 'exists:traders,id'],
        ]);

        Trader::find($request->input('trader_id'))->users()->attach($request->user());

        return redirect()->back()->with(['success' => 'Trader copied']);
    }

    public function destroy(Request $request, Trader $trader)
    {
        $trader->users()->detach($request->user());
        return redirect()->back()->with(['success' => 'Copy trading stopped']);
    }
}
