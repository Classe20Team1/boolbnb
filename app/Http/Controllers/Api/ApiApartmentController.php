<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use App\Apartment;
use App\Http\Resources\ServiceResource;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Sponsor;


class ApiApartmentController extends Controller
{
    public function search(Request $request)
    {

        $response = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $request->city . '.json?limit=1&key=' . env('TOMTOM_KEY'));


        $response = json_decode($response, true);
        $positionSearched = [
            'latit' => $response['results'][0]['position']['lat'],
            'longit' => $response['results'][0]['position']['lon'],
        ];

        $radius = 30;

        $filtered = Position::radius($positionSearched['latit'], $positionSearched['longit'], $radius);
        $arrayId = [];
        foreach ($filtered as $position) {
            array_push($arrayId, $position->apartment_id);
        }

        return response()->json(Apartment::with('services', 'position', 'imgs')
        ->orderBy("active", 'desc')
        ->find($arrayId)
        ->where('beds', '>=', $request->guests));
    }

    public function index(Request $request)
    {
        // $user = Auth::guard('api')->id();
        // $user = User::find($id);
        // $user = User::find(Auth::user()->id);
        // $user = Auth::user();
        // $apartments = $user->apartments;
        // $sponsors = Sponsor::active();
        // $array_sponsored = [];
        // foreach ($sponsors as $sponsor) {
        //     array_push($array_sponsored, $sponsor->apartment_id);
        // }
        
        return response()->json($request);
    }
}
