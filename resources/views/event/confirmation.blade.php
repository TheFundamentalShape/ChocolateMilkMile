@extends('layouts.app')

@section('content')
    <h1 class="text-5xl verygood-font">Groovy! You're in!</h1>
    <div class="text-lg text-gray-600 mt-8">
        <p class="my-2">You've successfully registered for the event below!</p>
    </div>

    <div class="mt-10 bg-white rounded shadow p-8">
        <h1 class="verygood-font text-4xl">{{ $event->title }}</h1>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ $event->formatted_date }}</p>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ $event->location }}</p>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ $event->formatted_price }}</p>
    </div>

    <div class="text-lg text-gray-600 mt-8">
        <p class="my-2">Your registration number is {{ $registration->confirmation_number }}. You’ll want to retain this number until the day of the event.</p>
        <p class="my-2">Please bring your registration number the day of the event for a seamless check-in experience. </p>
        <p class="my-2">If you need to cancel your registration, request a refund, or if you have any questions, please reach out to us.</p>
    </div>

    <div class="mt-8">
        <a class="bg-blue-500 hover:bg-blue-700 w-1/3 rounded px-4 py-2 text-white mt-4 shadow" href="/registrations">Go to your registrations</a>
    </div>

@endsection
