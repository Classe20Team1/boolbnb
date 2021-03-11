<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Service;
use App\User;
use App\Position;
use App\UserInfo;
use App\File;
use App\Img;
use App\SponsorType;
use App\Sponsor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Braintree;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $amount = $request->amount;
        $nonce = $request->nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        $user = Auth::user();
        $apartments = $user->apartments;

        if ($result->success) {

        $transaction = $result->transaction;
        $apartment = Apartment::find($request->apartment_id);
        $sponsortype = SponsorType::find($request->sponsortype_id);
        $date = Carbon::now();
        $today = $date->format('Y-m-d');
        $expire = $date->addDays($sponsortype->days)->format('Y-m-d');

        DB::table('sponsors')->insert([
            'apartment_id' => $apartment->id,
            'type_id' => $sponsortype->id,
            'date_start' => $today,
            'date_end' => $expire,
        ]);

        return response()->json(array(
                                    'success_message' => $transaction->id,
                                    'error' => '',
                                    'apartments' => $apartments,
                                    'apartment_id' => $apartment->id,
                                    'type_id' => $sponsortype,
                                    'today' => $today,
                                    'expire' => $expire
        ));
        } else {
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
               $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        return response()->json(array(
            'success_message' => '',
            'error' => $result->message,
            'apartments' => $apartments,
        ));

        }
    }
}
