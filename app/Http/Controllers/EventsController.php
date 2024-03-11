<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Event;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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

        $events = Event::join('types', 'events.type_id', '=', 'types.id')
            ->where('types.name', '=', $categoryName)
            ->select('events.*')
            ->get();


        if (!$events) {
            abort(404);
        }

        return view('events', compact('types'), compact('events' ));
    }

    function showOne($id)
    {
        $event = Event::where('id', $id)->first();
        return view('event', compact('event'));
    }
}
