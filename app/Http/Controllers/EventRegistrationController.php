<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Exceptions\PaymentFailedException;
use App\Registration;
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

    public function index()
    {
        return view('registrations', [
            'registrations' => Auth::user()->registrations()->confirmed()->get()
        ]);
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
            return back()->with('payment_error', 'Uh-oh! Your payment failed. Try again? If that fails, contact us!');
        }

        return response('event.confirmation', [
            'registration' => $registration,
            'event' => $event
        ]);
    }
}
