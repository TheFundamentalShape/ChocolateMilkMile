@extends('layouts.app')

@section('content')
    <h1 class="text-3xl md:text-5xl md:max-w-2xl verygood-font">Hey there {{ Auth::user()->name }}, here is your registration.</h1>

    @if($registrations->count() > 0)
        @foreach($registrations as $registration)
            <div class="mt-10 bg-white rounded shadow hover:shadow-2xl p-8">
                <div class="md:flex md:justify-between">
                    <div>
                        <h1 class="verygood-font text-4xl">{{ $registration->event->title }}</h1>
                        <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ $registration->event->formatted_date }}</p>
                        <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ $registration->event->location }}</p>
                        <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ $registration->event->formatted_price }}</p>
                    </div>
                    <div class="flex justify-center">
                        <div class="text-center">
                            {!! QrCode::size(250)->generate("$registration->confirmation_number") !!}
                            <p class="text-sm text-gray-500">Scan this code to check in the day of the event.</p>
                            <p class="text-sm text-gray-500">Confirmation number <b>{{ $registration->confirmation_number }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="mt-10 text-white bg-blue-500 rounded p-8 shadow">
            <h1 class="verygood-font text-4xl">You're not registered for anything!</h1>
            <p>We currently don't have any confirmed registrations for you! Please visit our registration page to select an event to register for!</p>
        </div>
    @endif
@endsection
