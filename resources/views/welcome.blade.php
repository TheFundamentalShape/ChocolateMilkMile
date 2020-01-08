@extends('layouts.landing')

@section('title')
    The Chocolate Milk Mile
@endsection

@section('content')
    <div id="hero" class="h-full bg-center bg-no-repeat bg-cover bg-fixed pt-16" style="background-image: url('/img/hero.png')">
        <h1 class="text-center py-2 text-5xl md:text-6xl text-white font-brand">August 1st, 2020</h1>
        <h1 class="text-center py-0 text-4xl md:text-5xl text-white font-brand">at the</h1>
        <h1 class="text-center py-2 text-5xl md:text-6xl text-white font-brand">Burnt Hills High School</h1>

        <div class="flex justify-center">
            <a href="/register" class="inline-block bg-active-yellow my-16 px-6 py-3 text-4xl text-chocolate font-brand hover:bg-white hover:text-chocolate rounded-lg shadow-2xl">Register today!</a>
        </div>
    </div>

    <div class="md:flex md:justify-center overflow-hidden" id="what">

        <div class="text-center md:text-left md:ml-20 p-12 smd:p-8 mt-16 mb-16">
            <div>
                <h2 class="font-brand text-chocolate text-6xl">What is this?!</h2>
                <p class="font-body text-black text-3xl smd:text-5xl">In The Chocolate Milk Mile, all runners must drink 1 cup of chocolate milk upon completion of every lap, equaling a half gallon of chocolate milk in total!</p>
                <p class="font-body text-gray-500 text-2xl">(simply put, it’s just a really great time)</p>
            </div>
        </div>

        <div class="smd:-mr-40">
            <img class="hidden md:block" src="/img/milk.png" alt="A glass of thick, creamy, delicious chocolate milk.">
        </div>

    </div>

    <div class="flex justify-center bg-chocolate p-20 text-center bg-no-repeat bg-cover" style="background-image: url('/img/ripple.png')">
        <div class="max-w-3xl">
            <h1 class="font-brand text-white lg:text-6xl md:text-5xl text-4xl">This race is being put on to celebrate the life of Noah Farrelly, who loved running.</h1>
            <p class="font-body text-white lg:text-4xl md:text-3xl text-2xl">All of the money (that we don’t spend on chocolate milk) will be donated to his family.</p>
        </div>
    </div>

    <div class="md:flex md:justify-center" id="prizes">

        <div class="hidden md:block md:ml-20 -mt-20 absolute p-12">
            <img class="-ml-48" src="/img/splash.png" alt="">
        </div>

        <div>
            <h2 class="font-brand text-chocolate text-6xl">Are there prizes?</h2>
            <p class="font-body text-black text-5xl">Of course! The top 5 places in the race will receive a t-shirt and some sweet bragging rights.</p>
        </div>

    </div>

    <div id="footer" class="bg-chocolate flex text-center justify-center p-12 bg-cover bg-no-repeat" style="background-image: url('/img/ripple.png')">
        <div>
            <h1 class="text-white font-brand text-5xl">What're ya waiting for?!</h1>
            <a href="/register" class="inline-block bg-active-yellow my-4 px-6 py-3 text-4xl text-chocolate font-brand hover:bg-white hover:text-chocolate rounded-lg shadow-2xl">Register today!</a>
        </div>
    </div>
@endsection