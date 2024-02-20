<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;

class BookController extends Controller
{
    public function insertData()
    {
        $postArr = [
            [
                'room_name' => 'Уютный стандартный номер',
                'price_at_hour' => '80',
                'room_img' => 'room_standard.jpg',
                'room_images' => json_encode([['image' => 'Images/img_4.png', 'text' => 'sdhflsdjfhkjshdjfhsjdhf'], ['image' => 'Images/img_4.png', 'text' => 'sdhflsdjfhkjshdjfhsjdhf'], ['image' => 'Images/img_4.png', 'text' => 'sdhflsdjfhkjshdjfhsjdhf']]),
                'room_attributes' => json_encode(['Бесплатный Wi-Fi', 'Кондиционер', 'Телевизор']),

            ]
        ];

        foreach ($postArr as $item)
        {
            Room::create($item);
            dump($item);
        }

    }

    public function index()
    {
        $rooms = Room::all();

        return view('book', compact('rooms'));
    }
}
