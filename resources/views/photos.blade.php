@extends('layouts.page')

@section('title')
    Photos
@endsection

@section('content')

    <div class="mt-16 md:mt-32">

        <div class="pb-10">
            <h1 class="text-center text-5xl md:text-6xl text-brown fat-font">Here's some photos!</h1>
            <p class="text-center text-gray-600 text-2xl skippy-font">(All of these beauties were taken by <a class="underline" href ="https://www.josephkhale.com/">Joseph Hale.</a>)</p>
        </div>

        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/clai.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/don.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/emily.png'>
            </div>
        </div>
        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/girls.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/markezra.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/liam.png'>
            </div>
        </div>
        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/girlwon.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/markwinning.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/mary.png'>
            </div>
        </div>
        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/me.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/niskygirl.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/won.png'>
            </div>
        </div>
        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/race.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/sam.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/tylerevancute.png'>
            </div>
        </div>
        <div class = "md:flex md:flex-wrap px-5">
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/win.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/park.png'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/pics/mary.png'>
            </div>
        </div>

    </div>
@endsection