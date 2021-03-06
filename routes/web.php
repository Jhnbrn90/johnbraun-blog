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

Route::middleware('page-cache')->group(function () {
    Route::get('/', 'BlogController@index');
    Route::get('/posts/{slug}', 'BlogController@show')->name('posts.show');
    Route::get('/about', 'BlogController@about');
});

Route::get('/preview/{slug}', 'PreviewController@show')->name('posts.preview');
Route::post('webmentions', 'WebmentionsController@store');
