<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Event;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    function show()
    {
        $events = Event::all();
        $types = Type::all();
        return view('events', compact('types'), compact('events'));
    }

    function showEventsByCategory($categoryName)
    {
        $types = Type::all();
        $events = DB::table('events')
            ->join('posts_categories', 'posts.post_id', '=', 'posts_categories.post_id')
            ->join('categories', 'posts_categories.category_id', '=', 'categories.category_id')
            ->where('categories.category_name', $categoryName)
            ->select('posts.*')
            ->get();

        if (!$events) {
            abort(404);
        }

        return view('events', compact('types'), compact('events' ));
    }
}
