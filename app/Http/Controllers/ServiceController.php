<?php

namespace App\Http\Controllers;

use App\Mail\ServiceOrderConfirmation;
use App\Models\Service;
use App\Models\ServiceLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $minPrice = Service::min('price');
        $maxPrice = Service::max('price');
        $minHours = Service::min('hours');
        $maxHours = Service::max('hours');

        $query = Service::query();

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

        $services = $query->get();

        return view('services', compact('services', 'minPrice', 'maxPrice', 'minHours', 'maxHours'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeLead(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        // Создание записи в базе данных
        $serviceLead = ServiceLead::create($request->all());
//
        // Отправка электронного сообщения
        Mail::send([], [], function ($message) use ($request) {
            $message->to($request->email, 'Activitar')->subject('Подтверждение заказа услуги');
            $message->from('nikitapolovkov1@gmail.com', 'Activitar');
            $message->text('Ваш заказ успешно оформлен. Мы свяжемся с вами в ближайшее время.');
        });

        // Возвращение ответа
        return response()->json(['success' => 'Спасибо, ваша заявка успешно отправлена!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

    public function showByPrice($price)
    {
            $services = Service::all();
            if($price == "asc")
            {
                $houses = Service::orderBy('price', 'asc')->get();
            }else{
                $houses = Service::orderBy('price', 'desc')->get();
            }

        return view('services', compact('services'));


    }
}
