<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Registration;
use App\Event;
use App\Events\RegistrantCheckedIn;
use App\Exceptions\AlreadyCheckedInException;

Route::get('/', function () {
    return view('welcome');
})->name("landing.home");
Route::get('/contact', 'ContactSubmissionController@create')->name("landing.contact");
Route::post('/contact', 'ContactSubmissionController@post')->name("landing.contact.post");
Route::get('/about', function () {
    return view('about');
})->name("landing.about");
Route::get('/photos', function () {
    return view('photos');
})->name("landing.photos");

// User End
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registrations', 'EventRegistrationController@index')->name('registration.index');
Route::get('/events/{event}/register', 'EventRegistrationController@get')->name('registration');
Route::post('/events/{event}/register', 'EventRegistrationController@post')->name('registration.post');
Route::get('/events/{event}/registrations/{registration}/confirmation', 'RegistrationConfirmationController@get')->name('registration.confirmation');

Route::get('/user/api/registrations', function(){
    return Auth::user()->registrations;
});

/*
Route::get('/getreg/{registration}', function(\App\Registration $registration){
    return (new App\Mail\RegistrationConfirmed($registration))->render();
});
*/

Auth::routes();
Broadcast::routes();

// Admin End
Route::middleware(['manager'])->group(function (){
    Route::get('/manager', 'ManagementPageController@index');

    Route::get('/manager/support', 'ContactSubmissionController@index');
    Route::post('/manager/support/{contactSubmission}/delete', 'ContactSubmissionController@delete');

    Route::get('/manager/events/create', 'EventController@create');
    Route::post('/manager/events/create', 'EventController@post');

    Route::get('/manager/registrants', 'RegistrantController@index');
    Route::post('/manager/registrants', function (Request $request){
        return Registration::confirmed()->where('event_id', $request->event_id)->get();
    });

    Route::get('/manager/check-in', 'ManagementPageController@checkin');
    Route::post('/manager/check-in', function (Request $request){
        try {

            $registration = Registration::where('confirmation_number', $request->confirmation_number)
                ->firstOrFail()
                ->checkIn();

            $event = $registration->event;

            event(new RegistrantCheckedIn($registration));

            return [
                'registration' => $registration,
                'event' => $event
            ];
        } catch (AlreadyCheckedInException $exception){
            return response([
                'error' => 'This registrant is already checked in.',
            ], 422);
        }
    });

    Route::get('/manager/api/event/{event}/registrants', function(Event $event){
        return $event->registrations;
    });
    Route::get('/manager/api/confirmation/{confirmationNumber}', function ($confirmationNumber){
        return Registration::where('confirmation_number', $confirmationNumber)->firstOrFail();
    });

});