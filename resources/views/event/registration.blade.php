<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/825a6bb202.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="bg-gray-200">
<div id="app">

    <registrant-nav></registrant-nav>

    <div class="mx-20 my-12 flex justify-center">
        <div class="max-w-2xl">
            <h1 class="text-3xl lg:text-5xl md:text-4xl verygood-font">Awesome sauce. Here's the event that you're registering for.</h1>

            @if($errors->any())
                <div class="mt-4 bg-red-100 text-red-500 border-2 border-red-500 rounded p-4">
                    <h3 class="text-xl verygood-font">Something went wrong...</h3>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('payment_error'))
                <div class="mt-4 bg-red-100 text-red-500 border-2 border-red-500 rounded p-4">
                    <h3 class="text-xl verygood-font">Well this is awkward...</h3>
                    <p>Your card didn't go through. Maybe try again? Maybe call for help? We're not quite sure.</p>
                </div>
            @endif

            <registration-form csrf="{{ csrf_token() }}" :event="{{ $event->toJson() }}"></registration-form>

        </div>
    </div>

</div>

<script type="application/javascript" src="/js/app.js"></script>

</body>
</html>