@extends('layouts.landing')

@section('title')
    Photos
@endsection

@section('content')
    <h1 class="text-center py-2 text-5xl md:text-6xl text-black font-brand">All photos taken by <a href ="https://www.josephkhale.com/">Joseph Hale.</a></h1>

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
@endsection