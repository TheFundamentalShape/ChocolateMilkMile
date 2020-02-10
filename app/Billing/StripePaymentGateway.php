<?php

namespace App\Billing;

use App\Registration;
use App\Exceptions\PaymentFailedException;

use Stripe\Exception\CardException;
use Stripe\Stripe;

class StripePaymentGateway implements PaymentGateway
{
    public function __construct(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function charge(Registration $registration, $token)
    {
        try
        {
            \Stripe\Charge::create([
                'amount' => $registration->price,
                'currency' => 'usd',
                'description' => 'Event Registration Fee',
                'source' => $token
            ]);
        }
        catch (CardException $exception)
        {
            // if it failed, cancel the registration
            $registration->cancel();

            // throw a payment failed exception
            throw new PaymentFailedException();
        }

        return $registration->confirm();

    }
}