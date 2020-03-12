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
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ ($registration->price + 1300)/100 }}.00</p>
    </div>

    <div class="text-lg text-gray-600 mt-8">
        <p class="my-2">
            Your registration number is {{ $registration->confirmation_number }}.
            This is what you'll use on the day of the event to check in. We also
            have a dashboard that shows all of your registrations with
            a handy dandy QR code that we can scan to check you in quickly!
        </p>
        <p class="my-2">Please bring your registration number or the QR code the day of the event for a seamless check-in experience.</p>
        <p class="my-2">If you need to cancel your registration, request a refund, or if you have any questions, <a class="font-bold hover:underline" href="/contact?confirmationNumber={{ $registration->confirmation_number }}" target="_blank">please reach out to us.</a></p>
    </div>

    @if($registration->hasShirtOrder())
        <div class="mt-10 bg-green-100 border-2 border-green-500 text-green-500 p-8 rounded">
            <h1 class="verygood-font text-xl text-green-600">You also have a shirt with your order!</h1>
            <p class="my-2">Your registration also includes a sweet Chocolate Milk Mile t-shirt! When you check in for the event, you will be given your shirt!</p>
        </div>
    @endif

    <div class="mt-8">
        <p class="text-lg text-gray-600">To view all of your registrations, and get at your QR code, you can click the blue button below! Also, check your email. We'll email you a copy of this too!</p>
        <a class="inline-block bg-blue-500 hover:bg-blue-700 rounded px-5 py-3 text-white mt-4 shadow" href="/registrations">Go to your registrations</a>
    </div>

@endsection
