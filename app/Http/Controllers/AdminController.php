<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {

        $houses = House::all();
        $leads = Lead::orderby('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard',  compact('leads', 'houses'));
    }


    public function houses()
    {
        $houses = House::all();
        return view('admin.houses',  compact( 'houses'));
    }

    public function addhouse(){

        $files = Storage::disk('public')->files('admin');

        // Вернуть представление с файлами
        return view('admin.addhouse', ['files' => $files]);
    }

    public function storeHouse(Request $request){
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_at_day' => 'required|numeric',
            'attributes' => 'required|json',
            'images' => 'required|string',
            'long_description' => 'nullable|string',
        ]);

        // Пример сохранения данных (предполагается, что у вас есть модель House)
        $house = new House();
        $house->name = $request->input('name');
        $house->description = $request->input('description');
        $house->price_at_day = $request->input('price_at_day');
        $house->attributes = $request->input('attributes');
        $house->images = $request->input('images');
        $house->long_description = $request->input('long_description');
        $house->save();

        return redirect()->back()->with('success', 'Дом успешно создан!');
    }
}
