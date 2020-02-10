<?php

namespace App\Billing;


use App\Registration;

interface PaymentGateway
{
    public function charge(Registration $registration, $token);
}