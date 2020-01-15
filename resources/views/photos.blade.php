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
                <img class = "block h-auto w-full" src='/img/mikhail.jpg'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/img/colinbrother.jpg'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/img/joequinn.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 ">
            <div class = "mb-4 px-2 w-full md:w-1/3 ">
                <img class = "block h-auto w-full" src='/img/dante1.jpg'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/img/sean.jpg'>
            </div>
            <div class = "mb-4 px-2 w-full md:w-1/3">
                <img class = "block h-auto w-full" src='/img/dante2.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 -mx-2">
            <div class = "mb-4 px-2 sm:w-1/2  ">
                <img class = "block h-auto w-full" src='/img2/cana.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 ">
                <img class = "block h-auto w-full" src='/img2/clai.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 ">
                <img class = "block h-auto w-full" src='/img2/don.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 -mx-2">
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3 ">
                <img class = "block h-auto w-full" src='/img2/emily.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/girls.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/girlwon.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 -mx-2">
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3 ">
                <img class = "block h-auto w-full" src='/img2/mary.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/me.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/niskygirl.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 -mx-2">
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3 ">
                <img class = "block h-auto w-full" src='/img2/won.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/race.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/sam.jpg'>
            </div>
        </div>
        <div class = "flex flex-wrap px-5 -mx-2">
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3 ">
                <img class = "block h-auto w-full" src='/img2/tylerevancute.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/win.jpg'>
            </div>
            <div class = "mb-4 px-2 sm:w-1/2 md:w-1/3">
                <img class = "block h-auto w-full" src='/img2/park.jpg'>
            </div>
        </div>
    </div>
@endsection