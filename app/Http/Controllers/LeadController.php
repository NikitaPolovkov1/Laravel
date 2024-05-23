<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

// Подключаем модель Lead

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Создание новой записи в таблице leads
        $lead = new Lead();
        $lead->house_name = $request->house_name;
        $lead->full_name = $request->full_name;
        $lead->phone_number = $request->phone_number;
        $lead->email = $request->email;
        $lead->arrival_date = $request->arrival_date;
        $lead->departure_date = $request->departure_date;
        $lead->children_count = $request->children_count;
        $lead->adult_count = $request->adult_count;
        $lead->tariff = $request->tariff;
        $lead->price_at_day = $request->price_at_day;
        $lead->nights_count = $request->nights_count;
        $lead->total_price = $request->total_price;

        $lead->save();

        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10); // Генерация случайного пароля из 10 символов

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);





        $bookingData = [
            'house_name' => $lead->house_name,
            'full_name' => $lead->full_name,
            'phone_number' => $lead->phone_number,
            'email' => $lead->email,
            'arrival_date' => $lead->arrival_date,
            'departure_date' => $lead->departure_date,
            'children_count' => $lead->children_count,
            'adult_count' => $lead->adult_count,
            'tariff' => $lead->tariff,
            'price_at_day' => $lead->price_at_day,
            'nights_count' => $lead->nights_count,
            'total_price' => $lead->total_price,
        ];
        $updatedBookingsJson = json_encode($bookingData);


        $user = new User();
        $user->email = $request->email;
        $user->name = $request->full_name;
        $user->password = $password;
        $user->phone = $request->phone_number;
        $user->bookings_last = $updatedBookingsJson;

        $user->save();

        Mail::send([], [], function ($message) use ($password, $request) {
            $message->to('pravaderi@gmail.com', 'Activitar')->subject('test email');
            $message->from('nikitapolovkov1@gmail.com', 'Activitar');
            $message->text('This is your login and pass ' . $password . ' ' . $request->email);
        });



        return response()->json(['success' => true]);
    }
}
