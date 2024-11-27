<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index(Request $request)
    {
      return view("pool.index", [
        "pools" => Pool::query()
        ->active()
        ->whereDoesntHave("stakes", function ($query) use ($request) {
          $query->where("user_id", $request->user()->id);
        })
        ->limit(50)->get(),
        "stakes"=> $request->user()->stakes,
      ]);
    }
}
