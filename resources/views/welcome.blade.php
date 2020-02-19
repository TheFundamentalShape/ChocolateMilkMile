@extends('layouts.landing')

@section('title')
    The Chocolate Milk Mile
@endsection

@section('content')
    <div class="mt-64 -ml-64 md:ml-0" id="what">
        <div class="flex justify-center static">

            <div class="z-40">
                <img class="max-h-screen" src="/img/bottle.png">
            </div>

            <div class="my-auto z-40">
                <div class="max-w-xs lg:max-w-lg -mx-56 md:mx-0">
                    <h1 class="fat-font text-brown text-5xl lg:text-6xl">How it works</h1>
                    <p class="text-2xl lg:text-3xl text-brown skippy-font">All runners must drink 1 cup of chocolate milk upon completion of every lap. By the end of the race you will consume an entire half gallon of chocolate milk. Simply put, it's just a really great time.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-32 md:-mr-32" id="prizes">

        <div class="flex justify-center relative">
            <div class="my-auto max-w-xs lg:max-w-lg z-40 text-right">
                <h1 class="fat-font text-brown text-5xl lg:text-6xl">The Prizes</h1>
                <p class="text-2xl lg:text-3xl text-brown skippy-font">If you can drink a half gallon of thick, creamy, and delicious chocolate milk AND run a mile, you deserve a prize. This year, we've got some sweet t-shirts that we're giving away to all the winners.</p>
            </div>
            <div class="md:static -ml-16 absolute bottom-0 left-1/2">
                <img class="max-w-xl z-0" src="/img/pint.png">
            </div>
        </div>

    </div>

    <div class="flex justify-center">
        <div class="mt-4 mb-32 mt-32 lg:max-w-full max-w-md text-center">
            <a href="/register" class="hover:underline text-brown hover:text-dark-brown"><h1 class="fat-font text-6xl">Register Now!</h1></a>
            <p class="skippy-font text-brown text-2xl">This event costs <span class="font-bold text-2xl">$7</span> to register for. All of the money we raise (that we don’t spend on chocolate milk) will be donated to Noah’s family.</p>
        </div>
    </div>
@endsection