@extends('layouts.app')

@section('content')
    <h1 class="text-3xl md:text-5xl md:max-w-2xl verygood-font">Lets start by selecting the event you would like to register for.</h1>

    @if($events->count() > 0)
        @foreach($events as $event)
            <a href="{{ route('registration', $event->id) }}">
                <div class="mt-10 bg-white rounded shadow hover:shadow-2xl p-8">
                    <h1 class="verygood-font text-4xl">{{ $event->title }}</h1>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ $event->formatted_date }}</p>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ $event->location }}</p>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ $event->formatted_price }}</p>
                </div>
            </a>
        @endforeach
    @else
        <div class="mt-10 text-white bg-blue-500 rounded p-8 shadow">
            <h1 class="verygood-font text-4xl">Check back later!</h1>
            <p>We currently don't have any events open for registration at this time. Please check back later!</p>
        </div>
    @endif
@endsection
