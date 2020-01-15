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

        @include('layouts.nav')

        @yield('content')

    </div>
</div>
</body>

<script src="/js/nav.js"></script>

</html>