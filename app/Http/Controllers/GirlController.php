<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use Illuminate\Http\Request;

class GirlController extends Controller
{
    public function index(){
        $girls = Girl::all(1);
        dd($girls);

    }
}
