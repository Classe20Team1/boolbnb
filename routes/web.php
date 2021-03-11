<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Sponsor;

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
  $sponsors = Sponsor::active();
  $array = [];
  foreach ($sponsors as $sponsor){
    array_push($array, $sponsor->apartment_id);
  }
  $apartments = Apartment::find($array);
  return view('homepage', $apartments);
});

Route::get('/test', function (){
  return view('users.edit-layout');
});

Route::post('/payment/checkout', 'PaymentsController@checkout')->name('payment.checkout');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('apartments', 'ApartmentsController');
Route::get('/user/edit', 'UserInfoController@edit')->name('user.edit');
Route::patch('user', 'UserInfoController@update')->name('user.update');
Route::post('/search', 'ApartmentsController@search')->name('search');
Route::post('/apartments/{id}/sponsor', 'ApartmentsController@sponsor')->name('apartments.sponsor');

Route::get('/admin', 'AdminController@dashboard')->name('dashboard');
Route::resource('sponsor', 'SponsorController');