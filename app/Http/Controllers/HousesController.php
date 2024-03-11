<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HousesController extends Controller
{
    function show()
    {
        $houses = House::all();
        return view('houses', compact('houses'));
    }
    function showByPrice($price)
    {
        $houses = House::all();
        if($price == "asc")
        {

            $houses = House::orderBy('price_at_day', 'asc')->get();

        }else{
            $houses = DB::table('houses')->orderBy('price_at_day', 'desc')->get();
        }

        return view('houses', compact('houses'));
    }
}

