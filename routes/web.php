<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BlogController@index');
Route::get('/posts/{slug}', 'BlogController@show');
Route::get('/about', 'BlogController@about');
Route::get('/preview/{slug}', 'PreviewController@show');
Route::post('webmentions', 'WebmentionsController@store');

Route::get('/{slug}', 'BlogController@show');
