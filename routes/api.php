<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Sponsor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('search/apartments','Api\ApiApartmentController@search');
Route::get('services', 'Api\ServiceController@index');

Route::post('admin/apartments','Api\ApiApartmentController@index');
