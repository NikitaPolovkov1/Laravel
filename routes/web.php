<?php

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


Route::get('/blog/blogsingle', 'BlogSingleController@index');

Route::post('/submit-form', [App\Http\Controllers\LeadController::class, 'store'])->name('submit-form');


Auth::routes();

Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');

Auth::routes();

Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
