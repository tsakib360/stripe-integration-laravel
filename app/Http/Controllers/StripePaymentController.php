<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)

    {
        $amount = $request->get('amount');
        if($amount == null || $amount == '')
        {
            return redirect('/');
        }
        else
        {
            return view('stripe', compact('amount'));
        }
        
    }



    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([

            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment."

        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/');
    }
}
