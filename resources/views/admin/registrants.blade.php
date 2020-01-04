@extends('layouts.admin.app')

@section('content')
    <div class="flex justify-between">

        <div class="bg-white rounded shadow p-4 w-1/3">
            <h1 class="verygood-font text-xl">Select an Event</h1>

            <EventList :events="'@json($events)'"></EventList>
        </div>

        <div class="bg-white rounded shadow ml-4 p-4 w-full">

        </div>

    </div>
@endsection