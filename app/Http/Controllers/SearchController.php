<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->input('search');
        $houses = House::where('name', 'like', '%' . $search . '%')->get();
        $events = Event::where('name', 'like', '%' . $search . '%')->get();
        $posts = Post::where('post_title', 'like', '%' . $search . '%')->get();


        return view('search', compact('houses', 'events', 'posts'));
    }

}
