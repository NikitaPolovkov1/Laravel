<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'MainController@show');
Route::get('/houses', 'HousesController@show');
Route::get('/houses/{id}', 'HouseController@show')->name('house');
Route::get('/houses&price={price}', 'HousesController@showByPrice')->name('house');


Route::get('/usadba', 'UsadbaController@show');
Route::get('/gallery', 'GalleryController@show');
Route::get('/blog', 'BlogController@show');
Route::get('/blog/category={category}', [\App\Http\Controllers\BlogController::class,'showPostsByCategory']);

Route::get('/contacts', 'ContactsController@show');
Route::get('/events', 'EventsController@show');
Route::get('/events/{id}', 'EventsController@showOne');

Route::get('/event/category={category}', [\App\Http\Controllers\EventsController::class,'showEventsByCategory']);

Route::get('/about', 'AboutController@show');


Route::get('/blog/{id}', 'BlogController@show_single');

Route::post('/submit-form', [App\Http\Controllers\LeadController::class, 'store'])->name('submit-form');


Auth::routes();

Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Auth::routes();

Route::get('/search', 'SearchController@search')->name('search');





Route::post('save-lead', 'LeadController@store')->name('save-lead');


Route::get("email", [PHPMailerController::class, "email"])->name("email");
Route::post("send-email", [PHPMailerController::class, "composeEmail"])->name("send-email");


Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');

Route::get('/admin', "AdminController@show");

Route::get('/generate-report', [App\Http\Controllers\UserReportController::class, 'generateReport'])->name('generate.report');
Route::get('/generate-report-lead', [App\Http\Controllers\UserReportController::class, 'generateReportLead'])->name('generate.report.lead');
Route::get('/generate-report-form', function () {
    return view('report_form');
});

Route::get('/generate-report-form-lead', function () {
    return view('report_form_lead');
});



Route::post('/upload', [UploadController::class, 'upload'])->name('send.upload');



Route::get('/send_mail', 'MailController@send');
