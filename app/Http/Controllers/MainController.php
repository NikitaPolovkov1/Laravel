<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function show()
    {
        return view('welcome');
    }
}
