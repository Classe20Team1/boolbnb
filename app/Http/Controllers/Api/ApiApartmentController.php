<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use App\Apartment;
use App\Http\Resources\ServiceResource;

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

        $radius = 100;

        $filtered = Position::radius($positionSearched['latit'], $positionSearched['longit'], $radius);
        $arrayId = [];
        foreach ($filtered as $position) {
            array_push($arrayId, $position->apartment_id);
        }
        
        return response()->json(Apartment::with('services', 'position', 'imgs')
        ->find($arrayId)
        ->where('beds', '>=', $request->guests)
        ->where('active', '=', true));
    }
}
