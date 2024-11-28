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
            ->latest()
            ->whereDoesntHave("stakes", function ($query) use ($request) {
              $query->where("user_id", $request->user()->id);
            })->paginate(),
        "stakes"=> $request->user()->stakes,
      ]);
    }
}
