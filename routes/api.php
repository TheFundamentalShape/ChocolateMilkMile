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

Route::post('/checkin', function (Request $request){
    try {
        $registration = Registration::where('confirmation_number', $request->confirmation_number)->firstOrFail()->checkIn();
        $event = $registration->event;
        return [
            'registration' => $registration,
            'event' => $event
        ];
    } catch (\App\Exceptions\AlreadyCheckedInException $exception){
        return response([
            'error' => 'You are already checked in.',
        ], 422);
    }
});