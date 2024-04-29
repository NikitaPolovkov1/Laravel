<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    function show($id)
    {
        $house = House::where('houseID', $id)->first();
        $result = DB::table('houses')
            ->join('house_dates', 'houses.houseID', '=', 'house_dates.houseID')
            ->join('dates', 'house_dates.dateID', '=', 'dates.dateID')
            ->select('houses.houseID', 'houses.name', 'dates.dateID', 'dates.start_date', 'dates.end_date')
            ->get();

        $houses = House::orderby('created_at', 'desc')->take(2)->get();
        return view('house', compact('house', 'houses'), compact('result'));
    }




}
