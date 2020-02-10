<?php

use Illuminate\Http\Request;
use App\Registration;
use App\Event;

use App\Events\RegistrantCheckedIn;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/confirmation/{confirmationNumber}', function ($confirmationNumber){
    $registration = Registration::where('confirmation_number', $confirmationNumber)->firstOrFail();
    $event = $registration->event;

    return [
        'registration' => $registration,
        'event' => $event
    ];
});


Route::get('/events', function (){
    return Event::all();
});

Route::middleware('auth:api')->get('/registrations', function (Request $request){
    return $request->user()->registrations()->get();
});