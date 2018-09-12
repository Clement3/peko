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

Route::get('/test', 'TestController@test');
Route::get('/slide', 'TestController@slider');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/**
 * Routes pour l'administration.
 * Requier le rôle "admin" pour accéder à ces routes.
 * Prefix: /admin
 * Namespace: App\Http\Controllers\Admin;
 * Middleware: IsAdmin
 * Name:: admin
 */
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('IsAdmin')
    ->name('admin.')
    ->group(function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/parameters', 'ParametersController@index');
    Route::patch('/parameters', 'ParametersController@update');

    Route::resources([
        'users' => 'UsersController',
        'products' => 'ProductsController',
        'sliders' => 'SlidersController',
        'pages' => 'PagesController'
    ]);
});