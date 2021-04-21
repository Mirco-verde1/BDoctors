<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Braintree\Transaction as Braintree_Transaction;

class PaymentsController extends Controller
{
    public function make(Request $request)

    {

        $payload = $request->input('payload', false);
        $payment_method_nonce = $request->get('payment_method_nonce');
        $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $payment_method_nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);


        return view('layouts.guest/partials.checkout', compact('status'));
    }
}
