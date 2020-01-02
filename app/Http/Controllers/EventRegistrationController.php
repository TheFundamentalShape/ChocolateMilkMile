<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Exceptions\PaymentFailedException;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function get(Event $event) {
        return view('event.registration', ['event' => $event]);
    }

    public function post(Event $event) {

        $registration = $event->register(Auth::user());

        try
        {
            $this->paymentGateway->charge($registration, request('payment_token'));
        }
        catch (PaymentFailedException $exception)
        {
            $registration->cancel();
            return response([], 422);
        }

        return response([
            'confirmation_number' => $registration->confirmation_number,
            'confirmed_at' => $registration->confirmed_at,
            'registrant' => $registration->user()->first()->toArray()
        ], 201);
    }
}
