<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserReportExport;
class UserReportController extends Controller
{
    public function generateReport(Request $request)
    {
        // Получить данные о пользователях за выбранный период
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $users = User::whereBetween('created_at', [$startDate, $endDate])->get();

        // Создать экспорт в Excel и скачать файл
        return Excel::download(new UserReportExport($users), 'user_report.xlsx');
    }

    public function generateReportLead(Request $request)
    {
        // Получить данные о пользователях за выбранный период
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $leads = Lead::whereBetween('created_at', [$startDate, $endDate])->get();

        // Создать экспорт в Excel и скачать файл
        return Excel::download(new UserReportExport($leads), 'user_report.xlsx');
    }
}
