<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/825a6bb202.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div id="app">

        <div class="bg-white flex py-6 px-8 justify-between">
            <div>
                <span class="verygood-font">A Very Good Registration System, Inc.</span>
            </div>

            <a class="inline-block md:hidden">|||</a>
            <div class="hidden md:block">
                <a class="text-gray-500 hover:text-gray-700 mx-2">Hi there, {{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="bg-gray-800 px-8 text-white shadow-lg">
            <a href="/manager" class="inline-block hover:bg-gray-600 hover:shadow py-5 px-4">Admin Home</a>
            <a href="/manager/events/create" class="inline-block hover:bg-gray-600 hover:shadow py-5 px-4">Create a New Event</a>
            <a href="/manager/registrants" class="inline-block hover:bg-gray-600 hover:shadow py-5 px-4">View Registrants</a>
            <a href="/manager/check-in" class="inline-block hover:bg-gray-600 hover:shadow py-5 px-4">Registrant Check In</a>
        </div>

        <div class="mx-20 my-12">
            @yield('content')
        </div>

    </div>
</body>
</html>
