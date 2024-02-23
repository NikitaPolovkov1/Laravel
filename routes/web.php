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
Route::get('/usadba', 'UsadbaController@show');
Route::get('/gallery', 'GalleryController@show');
Route::get('/blog', 'BlogController@show');
Route::get('/blog/{id}', 'BlogController@show_single')->name('blogsingle');
Route::get('/blog/category={category}', 'BlogController@showPostsByCategory')->name('blog');
Route::get('/contacts', 'ContactsController@show');


Route::get('/about', 'AboutController@show');


Route::get('/blog/blogsingle', 'BlogSingleController@index');



