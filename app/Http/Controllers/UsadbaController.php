<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class UsadbaController extends Controller
{
    function show()
    {
       return view('usadba');
    }
}
