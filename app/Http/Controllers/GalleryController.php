<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function show()
    {
        return view('gallery');
    }
}
