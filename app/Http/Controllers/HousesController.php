<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    function show()
    {
        $houses = House::all();
        return view('houses', compact('houses'));
    }
}
