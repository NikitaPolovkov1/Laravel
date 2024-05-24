<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserReportExport;
class UserController extends Controller
{
    public function updateLogin(Request $request)
    {
        $request->validate([
            'new_login' => 'required|string|max:255|unique:users,email',
        ]);

        $user = Auth::user();
        $user->email = $request->new_login;
        $user->save();

        return redirect()->back()->with('success', 'Логин успешно изменен');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Пароль успешно изменен');
        } else {
            return redirect()->back()->with('error', 'Текущий пароль введен неверно');
        }
    }
}
