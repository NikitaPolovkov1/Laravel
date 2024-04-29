<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function show()
    {
       return view('admin');
    }
}
