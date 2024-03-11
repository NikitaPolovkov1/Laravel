<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $lead = new Lead();
        $lead->booking_date = $request->input('daterange');
        $lead->email = $request->input('exampleInputEmail1');
        $lead->number_of_people = $request->input('number_of_people');
        $lead->tariff = $request->input('inputGroupSelect02');
        $lead->full_name = $request->input('full_name');
        $lead->nationality = $request->input('nationality');
        $lead->phone_number = $request->input('phone_number');
        $lead->save();

        return redirect()->back()->with('success', 'Данные успешно добавлены в базу данных');
    }
}
