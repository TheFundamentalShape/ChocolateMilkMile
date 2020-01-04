<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/825a6bb202.js" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div id="app">

        <div class="bg-white shadow flex py-6 px-8 justify-between">
            <div>
                <span class="verygood-font">A Very Good Registration System, Inc.</span>
            </div>

            <a class="inline-block md:hidden">|||</a>
            <div class="hidden md:block">
                <a href="/registrations" class="text-gray-500 hover:text-gray-700 mx-2">Your Registrations <span class='px-2 py-1 bg-blue-500 rounded-full text-white'>{{ Auth::user()->registrations()->confirmed()->count() }}</span></a>
                <a class="text-gray-500 hover:text-gray-700 mx-2">Hi there, {{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="mx-20 my-12 flex justify-center">
            <div class="max-w-2xl">
                @yield('content')
            </div>
        </div>

    </div>
</body>
</html>
