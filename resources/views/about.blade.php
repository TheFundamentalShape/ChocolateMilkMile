@extends('layouts.landing')

@section('title')
    About
@endsection

@section('content')
    <div id="hero" class="object-none h-70 w-full bg-center bg-top bg-fixed" style="background-image: url('/img/grouppic.jpg')">
        <h1 class="py-20 color-blue-500 text-center py-10 text-5xl md:text-6xl text-white font-brand">August 1st, 2020</h1>
    </div>

    <div class="md:flex md:justify-center" id="what">
        <div class="md:ml-20 p-12 mt-16 mb-16">
            <h2 class="font-brand text-chocolate text-6xl">What is this?!</h2>
            <p class="font-body text-black text-5xl">In The Chocolate Milk Mile, all runners must drink 1 cup of chocolate milk upon completion of every lap, equaling a half gallon of chocolate milk in total!</p>
            <p class="font-body text-gray-500 text-2xl">(simply put, it’s just a really great time)</p>
        </div>
    </div>
@endsection