<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MediaLibraryController;
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
Route::post('/upload', [UploadController::class, 'upload'])->name('send.upload');
Route::get('/send_mail', 'MailController@send');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
});




Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::get('/admin/houses', [AdminController::class, 'houses'])->name('admin.houses');
Route::get('/admin/addhouse', [AdminController::class, 'addhouse'])->name('admin.houses');

Route::post('/admin/storehouse', [AdminController::class, 'storeHouse'])->name('admin.store');

Route::get('/admin/media-library', [MediaLibraryController::class, 'index'])->name('media.library');

Route::post('/admin/media-library/upload', [MediaLibraryController::class, 'upload'])->name('media.library.upload');

