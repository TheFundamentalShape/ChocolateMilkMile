<?php

namespace App\Http\Controllers;

use App\Registration;
use App\Event;
use Illuminate\Http\Request;

class RegistrationConfirmationController extends Controller
{
    public function get(Event $event, Registration $registration)
    {
        return view('event.confirmation', [
            'event' => $event,
            'registration' => $registration
        ]);
    }
}
