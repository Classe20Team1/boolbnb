<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;

class PaymentsController extends Controller
{
    
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

        if ($result->success) {
        $transaction = $result->transaction;


        return response()->json($transaction->id);
        // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
               $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        return response()->json($result->message);
        // return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}

