<?php

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

Route::get('/about', 'AboutController@index');
Route::get('/usadba', 'UsadbaController@index');
Route::get('/gallery', 'GalleryController@index');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/blogsingle', 'BlogSingleController@index');



