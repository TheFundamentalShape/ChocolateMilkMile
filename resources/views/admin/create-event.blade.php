@extends('layouts.admin.app')

@section('content')
    <div class="my-8">
        <h2 class="verygood-font text-3xl">Let's create a new Event.</h2>
    </div>

    <div class="bg-white my-4 rounded p-4 shadow">
        <form action="/manager/events/create" method="post">

            @csrf

            @if($errors->any())
                <div class="bg-red-500 p-4 mb-4 shadow rounded text-white">
                    <h1 class="verygood-font text-3xl">Hmm... Somethin' ain't quite right.</h1>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label>Event Title</label>
                <div class="my-2">
                    <input class="w-full rounded border px-2 py-2" name="title" type="text">
                </div>
            </div>

            <div>
                <label>Event Fee (in pennies please!)</label>
                <div class="my-2">
                    <input class="w-full rounded border px-2 py-2" name="fee" type="text">
                </div>
            </div>

            <div>
                <label>Event Location: </label>
                <div class="my-2">
                    <input class="w-full rounded border px-2 py-2" name="location" type="text">
                </div>
            </div>

            <div>
                <label>Event Date: </label>
                <div class="my-2">
                    <input class="w-full rounded border px-2 py-2" name="date" type="datetime-local">
                </div>
            </div>

            <div>
                <button class="rounded shadow bg-pink-500 hover:bg-pink-700 p-4 text-white">Create Event!</button>
            </div>

        </form>
    </div>
@endsection