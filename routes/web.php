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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

// User End
Route::get('/home', 'HomeController@index')->middleware('registered')->name('home');

Route::get('/registrations', 'EventRegistrationController@index')->name('registration.index');

Route::get('/events/{event}/register', 'EventRegistrationController@get')->name('registration.create');
Route::post('/events/{event}/register', 'EventRegistrationController@post')->name('registration.post');

Auth::routes();

// Admin End
Route::middleware(['manager'])->group(function (){
    Route::get('/manager', 'ManagementPageController@index');

    Route::get('/manager/events/create', 'EventController@create');
    Route::post('/manager/events/create', 'EventController@post');

    Route::get('/manager/registrants', 'ManagementPageController@registrants');
});
