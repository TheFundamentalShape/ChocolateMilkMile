@extends('layouts.page')

@section('title')
    Register
@endsection

@section('content')
    <div class="relative">

        <div class="flex justify-center">
            <div class="text-center mt-16 md:mt-32">
                <h1 class="text-brown fat-font text-5xl md:text-6xl">YooHoo! Let's get you registered!</h1>
            </div>
        </div>

        <div class="flex justify-center">
            <form class="max-w-sm md:max-w-4xl" action="/register" method="post">

                @csrf

                @if ($errors->any())
                    <div class="bg-yellow-500 rounded shadow-2xl p-4 mt-4">
                        <h1 class="fat-font text-2xl">Hmm... Something went wrong.</h1>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li class="skippy-font font-xl">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">What is your name?</label>
                    </div>
                    <input class="fat-font border rounded p-2 w-full" type="text" name="name">
                </div>

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">What is your email?</label>
                    </div>
                    <input class="fat-font border rounded p-2 w-full" type="email" name="email">
                </div>

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">What would you like your password to be?</label>
                    </div>
                    <input class="fat-font border rounded p-2 w-full" type="password" name="password">
                </div>

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">Give us that password one more time!</label>
                    </div>
                    <input class="fat-font border rounded p-2 w-full" type="password" name="password_confirmation">
                </div>

                <div class="my-8 flex justify-between">
                    <div class="pr-4">
                        <button type="submit" class="inline-block rounded px-12 py-3 font-body text-2xl text-white bg-brown hover:bg-dark-brown fat-font">Next!</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection