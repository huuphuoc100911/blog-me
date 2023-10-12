<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('payment.stripe.index');
    }
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SK'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => 'Send me money',
                        ],
                        'unit_amount' => 50
                    ],
                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
        ]);

        return redirect()->away($session->url);
    }
    public function success()
    {
        return view('payment.stripe.index');
    }
}
