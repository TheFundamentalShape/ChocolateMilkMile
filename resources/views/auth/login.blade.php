@extends('layouts.landing')

@section('title')
    Login
@endsection

@section('content')
    <div id="what" class="relative">

        <div class="flex justify-center">
            <div class="text-center w-64 md:w-1/2 lg:w-1/2 mt-16 lg:mt-24">
                <h1 class="text-chocolate font-brand text-5xl md:text-6xl">Welcome back! Please login!</h1>
            </div>
        </div>

        <div class="flex justify-center">
            <form class="max-w-sm md:max-w-4xl" action="/login" method="post">

                @csrf

                @if ($errors->any())
                    <div class="bg-active-yellow rounded shadow-2xl p-4 mt-4">
                        <h1 class="font-brand text-2xl">Hmm... Something went wrong.</h1>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li class="font-body font-xl">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="my-8">
                    <div>
                        <label class="font-body text-3xl pr-12" for="">What is your email?</label>
                    </div>
                    <input class="border rounded p-2 w-full" type="email" name="email">
                </div>

                <div class="my-8">
                    <div>
                        <label class="font-body text-3xl pr-12" for="">What is your password?</label>
                    </div>
                    <input class="border rounded p-2 w-full" type="password" name="password">
                </div>

                <div class="my-8 flex justify-between">
                    <div class="pr-4">
                        <button type="submit" class="inline-block rounded px-12 py-3 font-body text-2xl text-white bg-chocolate hover:bg-dark-chocolate hover:text-active-yellow">Next!</button>
                    </div>
                    <p class="font-body md:max-w-md text-gray-500 md:text-2xl">By clicking Next, you will be brought to the a good event registration system to complete the registration process for this event.</p>
                </div>

            </form>
        </div>

    </div>
@endsection