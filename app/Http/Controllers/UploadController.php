<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Проверяем, авторизован ли пользователь
        if (Auth::check()) {
            if ($request->hasFile('file')) {
                // Получение файла из запроса
                $file = $request->file('file');

                // Проверка на успешную загрузку файла
                if ($file->isValid()) {
                    // Получение оригинального имени файла
                    $fileName = $file->getClientOriginalName();

                    // Сохранение файла в папку storage/app/public
                    $path = $file->storeAs('public', $fileName);

                    // Получаем текущего пользователя
                    $user = Auth::user();

                    // Обновляем поле foto модели пользователя
                    $url = Storage::url($path);

                    $user->foto = $url;

                    // Сохраняем изменения в базе данных
                    $user->save();

                    // Возвращаем сообщение об успешной загрузке и путь к файлу
                    return response()->json(['message' => 'Файл успешно загружен', 'file_path' => asset($path)], 200);
                } else {
                    // Возвращаем сообщение об ошибке при загрузке файла
                    return response()->json(['message' => 'Ошибка при загрузке файла'], 400);
                }
            } else {
                // Возвращаем сообщение об ошибке при отсутствии загруженного файла
                return response()->json(['message' => 'Файл не был загружен'], 400);
            }
        } else {
            // Возвращаем сообщение об ошибке при отсутствии авторизации пользователя
            return response()->json(['message' => 'Пользователь не авторизован'], 401);
        }
    }
}
