<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Chocolate Milk Mile</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.typekit.net/suf2eff.css">
</head>

<body>

<div id="navbar" class="bg-chocolate bg-no-repeat bg-cover shadow" style="background-image: url('/img/ripple.png')">
    <h1 class="text-center py-4 text-4xl md:text-5xl lg:text-6xl text-white font-brand">The Chocolate Milk Mile</h1>
    <div class="flex justify-center">
        <a href="/" class="inline-block text-2xl md:text-3xl lg:text-4xl nav-link hover:underline hover:text-active-yellow">Home</a>
        <a href="/" class="inline-block text-2xl md:text-3xl lg:text-4xl nav-link hover:underline hover:text-active-yellow">About</a>
        <a href="/contact" class="inline-block text-2xl md:text-3xl lg:text-4xl nav-link hover:underline hover:text-active-yellow">Contact</a>
        <a href="/" class="inline-block text-2xl md:text-3xl lg:text-4xl nav-link hover:underline hover:text-active-yellow">Photos</a>
        <a href="/register" class="inline-block text-2xl md:text-3xl lg:text-4xl nav-link hover:underline hover:text-active-yellow">Register</a>
    </div>
</div>

<div id="what" class="relative">

    <div class="flex justify-center">
        <div class="text-center w-64 md:w-1/2 lg:w-1/2 mt-16 lg:mt-24">
            <h1 class="text-chocolate font-brand text-5xl md:text-6xl">YooHoo! Let's get you registered!</h1>
        </div>
    </div>

    <div class="flex justify-center">
        <form class="max-w-sm md:max-w-4xl" action="/register" method="post">

            @csrf

            @if ($errors->any())
                <div class="bg-active-yellow rounded shadow-2xl p-4 mt-4">
                    <h1 class="font-brand text-2xl">Hmm... Something went wrong.</h1>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li class="font-body font-xl">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="my-8">
                <div>
                    <label class="font-body text-3xl pr-12" for="">What is your name?</label>
                </div>
                <input class="border rounded p-2 w-full" type="text" name="name">
            </div>

            <div class="my-8">
                <div>
                    <label class="font-body text-3xl pr-12" for="">What is your email?</label>
                </div>
                <input class="border rounded p-2 w-full" type="email" name="email">
            </div>

            <div class="my-8">
                <div>
                    <label class="font-body text-3xl pr-12" for="">What would you like your password to be?</label>
                </div>
                <input class="border rounded p-2 w-full" type="password" name="password">
            </div>

            <div class="my-8">
                <div>
                    <label class="font-body text-3xl pr-12" for="">Give us that password one more time!</label>
                </div>
                <input class="border rounded p-2 w-full" type="password" name="password_confirmation">
            </div>

            <div class="my-8 flex justify-between">
                <div class="pr-4">
                    <button type="submit" class="inline-block rounded px-12 py-3 font-body text-2xl text-white bg-chocolate hover:bg-dark-chocolate hover:text-active-yellow">Next!</button>
                </div>
                <p class="font-body md:max-w-md text-gray-500 md:text-2xl">By clicking Next, you will be brought to the a good event registration system to complete the registration process for this event.</p>
            </div>

        </form>
    </div>

</div>

</body>
</html>