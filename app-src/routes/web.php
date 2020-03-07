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

Route::prefix('/')->namespace('Client')->name('clients.')->group(function () {

    Route::get('/', function () {
        return view('clients.welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});
Route::prefix('/admins')->namespace('Admin')->name('admins.')->group(function () {

    Route::get('/', function () {
        return view('admins.welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});
