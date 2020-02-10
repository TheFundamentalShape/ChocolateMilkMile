<?php

namespace App\Billing;


use App\Registration;
use App\Exceptions\PaymentFailedException;

class FakePaymentGateway implements PaymentGateway
{
    private $totalCharges;

    public function __construct(){
        $this->totalCharges = collect();
    }

    public function getValidTestToken()
    {
        return "validtoken";
    }

    public function getTotalCharges(){
        return $this->totalCharges->sum();
    }

    public function charge(Registration $registration, $token)
    {
        if($token == $this->getValidTestToken()) {
            // charge
            $this->totalCharges[] = $registration->price;

            //update registration with a confirmation number
            return $registration->confirm();
        }

        $registration->cancel();
        throw new PaymentFailedException();
    }
}