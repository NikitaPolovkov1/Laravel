<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function show()
    {
        return view('contacts');
    }
}
