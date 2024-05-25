<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class UsadbaController extends Controller
{
    function show()
    {

        $houses = House::all();
       return view('usadba', compact('houses'));
    }
}
