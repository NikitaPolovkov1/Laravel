<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function show()
    {
        $posts = Post::take(6)->get();
        return view('welcome',  compact('posts'));
    }
}
