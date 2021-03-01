<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('layouts.boolbnb');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('apartments', 'ApartmentsController');
Route::get('/user/edit', 'UserInfoController@edit')->name('user.info');
Route::patch('/user/update', 'UserInfoController@update')->name('user.update');

