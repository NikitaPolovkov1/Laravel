<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin'; // Добавляем условие для роли администратора

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна, перенаправляем на административную панель
            return redirect()->intended('/admin');
        }

        // Аутентификация не удалась, возвращаемся на страницу входа с ошибкой
        return redirect()->back()->withErrors([
            'email' => 'Неправильный email или пароль, либо вы не являетесь администратором.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
