<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Event;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class EventsController extends Controller
{
    function show(Request $request)
    {
        $minPrice = Service::min('price');
        $maxPrice = Service::max('price');
        $minHours = Service::min('hours');
        $maxHours = Service::max('hours');




        $query = Event::query();

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        if ($request->has('min_hours') && $request->has('max_hours')) {
            $query->whereBetween('hours', [$request->min_hours, $request->max_hours]);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort == 'hours_asc') {
                $query->orderBy('hours', 'asc');
            } elseif ($request->sort == 'hours_desc') {
                $query->orderBy('hours', 'desc');
            }
        }

        $events = $query->get();
        $types = Type::all();

        return view('events', compact('events', 'minPrice', 'maxPrice', 'minHours', 'maxHours'),compact('types'));

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
