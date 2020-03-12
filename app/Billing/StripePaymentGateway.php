<?php

namespace App\Billing;

use App\Registration;
use App\Exceptions\PaymentFailedException;

use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class StripePaymentGateway implements PaymentGateway
{
    private $totalCharges;

    public function __construct(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $this->totalCharges = collect();
    }

    public function charge(Registration $registration, $token)
    {
        $this->totalCharges->add($registration->price);

        if($registration->hasShirtOrder()){
            $this->totalCharges->add(1300);
        }

        try
        {
            \Stripe\Charge::create([
                'amount' => $this->totalCharges->sum(),
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
            throw new PaymentFailedException($exception);
        }
        catch (ApiErrorException $apiErrorException){
            // if it failed, cancel the registration
            $registration->cancel();

            // throw a payment failed exception
            throw new PaymentFailedException($exception);
        }

        return $registration->confirm();

    }
}