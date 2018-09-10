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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@test');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware('IsAdmin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::prefix('users')->group(function () {
        Route::get('/', 'UsersController@index');
        Route::get('/{user}', 'UsersController@show');
        Route::get('/{user}/edit', 'UsersController@edit');
        Route::patch('/{user}/update', 'UsersController@update');
        Route::get('/{user}/delete', 'UsersController@delete');
    });
});