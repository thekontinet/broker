<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class StakingController extends Controller
{
   public function index(){
    return view("stake.index", [
      "stakes" => Pool::active()->limit(50)->get(),
    ]);
   }
}
