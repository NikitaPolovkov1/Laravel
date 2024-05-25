<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HousesController extends Controller
{
    public function show(Request $request)
    {
        $query = House::query();

// Получаем минимальную и максимальную цену из параметров запроса, если они существуют
        $minPrice = $request->input('min_price', House::min('price_at_day'));
        $maxPrice = $request->input('max_price', House::max('price_at_day'));

// Применяем фильтры по цене
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price_at_day', [$minPrice, $maxPrice]);
        }

// Применяем фильтры по дате
        if ($request->has('start_date') && $request->has('end_date') === null) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query->leftJoin('house_dates', 'houses.houseID', '=', 'house_dates.houseID')
                ->leftJoin('dates', 'house_dates.dateID', '=', 'dates.dateID')
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->where(function ($q) use ($startDate, $endDate) {
                        $q->where('dates.start_date', '<=', $endDate)
                            ->where('dates.end_date', '>=', $startDate);
                    })
                        ->orWhereNull('dates.dateID');
                });
        }

// Применяем сортировку по цене
        if ($request->input('sort') == 'price_asc') {
            $query->orderBy('price_at_day', 'asc');
        } elseif ($request->input('sort') == 'price_desc') {
            $query->orderBy('price_at_day', 'desc');
        }

        $houses = $query->select('houses.*')->distinct()->get();

        return view('houses', compact('houses', 'minPrice', 'maxPrice'));


    }
    function showByPrice($price)
    {
        $houses = House::all();
        if($price == "asc")
        {

            $houses = House::orderBy('price_at_day', 'asc')->get();

        }else{
            $houses = DB::table('houses')->orderBy('price_at_day', 'desc')->get();
        }

        return view('houses', compact('houses'));
    }
}

