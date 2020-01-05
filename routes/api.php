<?php

use Illuminate\Http\Request;
use App\Registration;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/confirmation/{confirmationNumber}', function ($confirmationNumber){
    $registration = Registration::where('confirmation_number', $confirmationNumber)->firstOrFail();

    $event = $registration->event;

    return [
        'registration' => $registration,
        'event' => $event
    ];
});

Route::post('/confirmation/{confirmationNumber}/checkin', function ($confirmationNumber){
    $registration = Registration::where('confirmation_number', $confirmationNumber)->firstOrFail();

    $registration->checkIn();

    $event = $registration->event;

    return [
        'registration' => $registration,
        'event' => $event
    ];
});