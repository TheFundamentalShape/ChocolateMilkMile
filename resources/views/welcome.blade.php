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
                    <h1 class="fat-font text-brown text-5xl lg:text-6xl">What is this?</h1>
                    <p class="text-2xl lg:text-3xl text-brown skippy-font">
                        The Chocolate Milk Mile is an event dedicated to celebrating the life
                        of Noah Farrelly, who loved running. All of the proceeds from this event
                        will be donated to the Noah Farrelly Memorial Fund.
                    </p>

                    <p class="text-2xl my-8 lg:text-3xl text-brown skippy-font">
                        The event entails that participants drink a glass of chocolate milk
                        upon completion of every lap of a mile. This adds up to be about a
                        half gallon of chocolate milk.
                    </p>

                    <p class="text-2xl my-8 lg:text-3xl text-brown skippy-font">
                        Not only is it a great cause, but it's an awesome time for the community
                        to get together and have some fun.
                    </p>


                </div>
            </div>

        </div>
    </div>

    <div class="mt-32 md:-mr-32" id="prizes">

        <div class="flex justify-center relative">
            <div class="my-auto max-w-xs lg:max-w-lg z-40 text-right">
                <h1 class="fat-font text-brown text-5xl lg:text-6xl">Who can run?</h1>
                <p class="text-2xl lg:text-3xl text-brown skippy-font">
                    Everybody! We have different heats for people of all different fitness levels.
                    Sean Dolan, a national champion, was one of our participants last year and in
                    his first chocolate milk mile he ran 8:40, finishing in last place. It is safe
                    to say there's no association between how fast you run, and how much milk you
                    drink.
                </p>
                <a href="/about" class="inline-block mt-5 text-xl lg:text-3xl text-brown fat-font hover:underline">Learn more about this race!</a>
            </div>
            <div class="md:static -ml-16 absolute bottom-0 left-1/2">
                <img class="max-w-xl z-0" src="/img/pint.png">
            </div>
        </div>

    </div>

    <div class="flex justify-center">
        <div class="mt-4 mb-32 mt-32 lg:max-w-full max-w-md text-center">
            <a href="/register" class="hover:underline text-brown hover:text-dark-brown"><h1 class="fat-font text-6xl">Register Now!</h1></a>
            <p class="skippy-font text-brown text-2xl px-6">
                All of the proceeds from this event are going to the Noah Farrelly Memorial Fund. You can donate by participating in the event, or purchasing a T-shirt.
                You can purchase a T-shirt for $15 dollars, you can register for $7, or you can do both for $20!
                We'll also be accepting donations of shoes and running flats on the day of the event.
            </p>
        </div>
    </div>

@endsection