@extends('layouts.admin.app')

@section('content')
    <div class="my-8">
        <h2 class="verygood-font text-3xl">Hi there, {{ Auth::user()->name }}.</h2>
        <p>Here's a brief breakdown of your events.</p>
    </div>

    <div class="md:flex md:justify-between">
        <div class="w-full my-2 md:my-0 md:mr-4 rounded p-4 bg-white shadow">
            <h3 class="">Total Events</h3>
            <p class="verygood-font my-2 text-3xl">{{ $events->count() }}</p>
        </div>

        <div class="w-full my-2 md:my-0 md:mx-4 rounded p-4 bg-white shadow">
            <h3 class="">Total Registrants</h3>
            <p class="verygood-font my-2 text-3xl">{{ App\Registration::all()->count() }}</p>
        </div>

        <div class="w-full my-2 md:my-0 md:ml-4 rounded p-4 bg-white shadow">
            <h3 class="">Total Revenue</h3>
            <p class="verygood-font my-2 text-3xl">{{ $totalRevenue }}</p>
        </div>
    </div>
@endsection