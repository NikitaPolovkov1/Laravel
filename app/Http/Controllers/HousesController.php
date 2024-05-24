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
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Фильтруем дома по диапазону дат
            $query->whereHas('dates', function ($q) use ($startDate, $endDate) {
                $q->where('start_date', '<=', $endDate)
                    ->where('end_date', '>=', $startDate);
            });
        }

        // Применяем сортировку по цене
        if ($request->input('sort') == 'price_asc') {
            $query->orderBy('price_at_day', 'asc');
        } elseif ($request->input('sort') == 'price_desc') {
            $query->orderBy('price_at_day', 'desc');
        }

        $houses = $query->get();

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

