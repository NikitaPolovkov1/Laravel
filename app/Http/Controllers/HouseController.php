<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    function show($id)
    {
        $house = House::with('date')->findOrFail($id);
        return view('house', compact('house'));
    }
}
