<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function search(Request $request)
    {
       return Food::where('name','like','%'.$request->q.'%')
            ->orderBy('name')
            ->limit(10)
            ->get(['id','name','calories']);
    }
}
