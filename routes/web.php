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
    return view('homepage');
});
Route::get('/search', function () {
    return view('search');
});

Route::get('/test', function (){
  return view('register-bnb');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('apartments', 'ApartmentsController');
Route::get('/user/edit', 'UserInfoController@edit')->name('user.edit');
Route::post('/search', 'ApartmentsController@search')->name('search');
Route::patch('user', 'UserInfoController@update')->name('user.update');
Route::delete('/apartments/{id}', 'ApartmentsController@destroy')->name('apartment.destroy');