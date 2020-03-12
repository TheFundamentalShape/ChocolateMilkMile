<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PaymentFailedException extends Exception
{
    private $stripeException;

    public function __construct($stripeException, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->stripeException = $stripeException;
    }

    public function getStripeException()
    {
        return $this->stripeException;
    }
}
