<?php

namespace App;

class ConfirmationIssuer
{
    public static function confirmationNumberExists($confirmationNumber){
        return Registration::where('confirmation_number', $confirmationNumber)->exists();
    }

    public static function issueConfirmationNumber(){
        $number = mt_rand(1000000000, 9999999999);

        if (self::confirmationNumberExists($number)) {
            return self::issueConfirmationNumber();
        }

        return $number;
    }
}