<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaLibraryController extends Controller
{
    public function index()
    {
        $files = Storage::disk('public')->files('admin');

        // Вернуть представление с файлами
        return view('admin.media-library', ['files' => $files]);

    }


    public function upload(Request $request)
    {
        // Валидация загружаемого файла
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Сохранение файла
        if ($request->file('file')) {
            $filePath = $request->file('file')->store('admin', 'public');
        }

        // Перенаправление обратно на страницу медиабиблиотеки
        return redirect()->route('media.library')->with('success', 'Изображение успешно загружено');
    }
}

