@extends('layouts.admin.app')

@section('content')
    <div class="mt-8">
        <h2 class="verygood-font text-3xl">Support Requests</h2>
    </div>

    @if($supportRequests->count() == 0)

        <div class="bg-blue-500 rounded shadow text-white p-4 mt-4">
            You have no new support requests!
        </div>

    @endif

    @foreach($supportRequests as $supportRequest)

        <div class="bg-white p-4 rounded shadow my-4">
            <h2 class="verygood-font text-2xl">{{ $supportRequest->name }}</h2>
            <p>Email: {{ $supportRequest->email }}</p>
            <div class="italic border-l-2 p-4 mt-2">
                {{ $supportRequest->message }}
            </div>
            <form method="post" action="/manager/support/{{ $supportRequest->id }}/delete">
                @csrf
                <button class="mt-2 bg-white hover:shadow hover:text-white hover:bg-red-500 text-red-500 border border-red-500 rounded px-4 py-2">Delete Message</button>
            </form>
        </div>

    @endforeach


@endsection