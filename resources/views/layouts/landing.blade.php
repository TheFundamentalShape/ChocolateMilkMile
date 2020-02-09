<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.typekit.net/pkr6dis.css">

    <title>@yield('title')</title>
</head>
<body>
<div class="flex justify-center">
    <div class="max-w-4xl overflow-x-hidden overflow-y-visible">

        <div id="hero">

            <div class="w-full flex justify-center">
                <img class="max-h-screen -mt-32 pb-8" src="/img/splash.png">
            </div>

            <div class="flex justify-center">
                <div class="text-center -mt-40 md:-mt-56">
                    <h1 class="fat-font text-4xl md:text-6xl text-brown relative"><span class="tilty absolute skippy-font text-3xl -mt-6 -ml-3 md:-mt-4 md:-ml-3 md:top-0 md:left-0">the</span> Chocolate Milk Mile</h1>
                    <h3 class="fat-font my-1 text-2xl md:text-3xl text-brown">August 1st, 2020 @ The BHBL High School</h3>
                    <p class="px-3 text-brown skippy-font text-xl">(to celebrate the life of Noah Farrelly who really loved running. And chocolate milk.)</p>
                    <div class="mt-10">
                        <div class="flex justify-center z-50">
                            <div id="header" class="bg-brown rounded-lg flex justify-between text-white shadow">
                                <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.home') ? 'bg-dark-brown' : '' }} rounded-l-lg py-4"><a class="mx-4 fat-font" href="/">Home</a></div>
                                <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.contact') ? 'bg-dark-brown' : '' }} py-4"><a class="mx-4 fat-font" href="/contact">Contact</a></div>
                                <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.photos') ? 'bg-dark-brown' : '' }} py-4"><a class="mx-4 fat-font" href="/photos">Photos</a></div>
                                <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('register') ? 'bg-dark-brown' : '' }} rounded-r-lg py-4"><a class="mx-4 fat-font" href="/register">Register</a></div>
                            </div>

                            <div id="fullNav" class="hidden flex justify-between fixed top-0 w-full z-50 bg-brown text-white shadow-2xl">

                                <div class="hidden md:block pl-8">
                                    <h1 class="fat-font text-2xl md:text-3xl text-white relative my-4"><span class="tilty absolute skippy-font text-3xl -mt-6 -ml-3 md:-mt-6 md:-ml-4 md:top-0 md:left-0">the</span> Chocolate Milk Mile</h1>
                                </div>

                                <div class="flex justify-center md:justify-between my-auto">
                                    <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.home') ? 'bg-dark-brown' : '' }} py-4"><a href="/" class="px-4 fat-font">Home</a></div>
                                    <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.contact') ? 'bg-dark-brown' : '' }} py-4"><a href="/contact" class="px-4 fat-font">Contact</a></div>
                                    <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.photos') ? 'bg-dark-brown' : '' }} py-4"><a href="/photos" class="px-4 fat-font">Photos</a></div>
                                    <div class="hover:bg-dark-brown {{ Route::currentRouteNamed('landing.register') ? 'bg-dark-brown' : '' }} py-4"><a href="/register" class="px-4 fat-font">Register</a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @yield('content')

    </div>
</div>
</body>

<script src="/js/nav.js"></script>

</html>