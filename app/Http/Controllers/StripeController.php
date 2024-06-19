<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('User.index');
    }

    public function createCheckoutSession(Request $request)
    {
        // تعيين مفتاح API
        $stripe = new \Stripe\StripeClient('rk_test_51PSkbzE656ExER5LyCcsJNrJGvyOlNMLERr4DieqpN2cXDfY7xyHz1CkNuIlLVXUIH7rVtaUoKEahpshUaubcuN500cLmeGbq1');

        $stripe->checkout->sessions->create([
          'line_items' => [
            [
              'price_data' => [
                'currency' => 'usd',
                'product_data' => ['name' => 'T-shirt'],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ],
          ],
          'mode' => 'payment',
          'success_url' => 'http://localhost:4242/success.html',
          'cancel_url' => 'http://localhost:4242/cancel.html',
        ]);
    }

    public function success()
    {
        return 'Payment successful!';
    }

    public function cancel()
    {
        return 'Payment canceled!';
    }
}
