<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{
  public function checkout(Request $request)
  {
      Stripe::setApiKey(env('STRIPE_SECRET'));

      $session = Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
              'price_data' => [
                  'currency' => 'usd',
                  'product_data' => [
                      'name' => 'Course Name',
                  ],
                  'unit_amount' => 2000, // السعر هنا بالسنتات (2000 سنت = 20 دولار)
              ],
              'quantity' => 1,
          ]],
          'mode' => 'payment',
          'success_url' => route('payment.success'),
          'cancel_url' => route('payment.cancel'),
      ]);

      return redirect($session->url);
  }

  public function success()
  {
      
      return view('payment.success');
  }

  public function cancel()
  {
      
      return view('payment.cancel');
  }
}
