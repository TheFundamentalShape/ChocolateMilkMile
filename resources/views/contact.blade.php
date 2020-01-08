@extends('layouts.landing')

@section('title')
    Contact Us!
@endsection

@section('content')
    <div id="head" class="relative mt-16">

        <div class="p-4 md:flex">
            <div class="text-center md:max-w-lg lg:mx-auto">
                <h1 class="text-chocolate font-brand text-5xl md:text-6xl">Have a question?</h1>
                <p class="text-black text-3xl md:text-4xl lg:text-5xl font-body">Feel Free to reachout! We’ll get back to you as soon as we possibly can.</p>
                <p class="text-gray-600 text-2xl md:text-3xl font-body">(You can use the form below to reach us!)</p>
            </div>
            <div class="hidden md:block md:absolute md:right-0 md:overflow-hidden">
                <div class="-mr-40">
                    <img src="/img/cow.png" alt="">
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <form class="max-w-sm md:max-w-4xl" action="/contact" method="post">

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

                @if (Session::has('success'))
                    <div class="bg-green-500 text-white rounded shadow-2xl p-4 mt-4">
                        <h1 class="font-brand text-3xl md:text-4xl">Awesome sauce!</h1>
                        <p class="font-body text-xl">{{ Session::get('success') }}</p>
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
                        <label class="font-body text-3xl pr-12" for="">What are ya inquiring about?</label>
                    </div>
                    <textarea name="message" class="border rounded p-2 w-full"></textarea>
                </div>

                <div class="my-8 flex justify-between">
                    <div class="pr-4">
                        <button type="submit" class="inline-block rounded px-12 py-3 font-body text-2xl text-white bg-chocolate hover:bg-dark-chocolate hover:text-active-yellow">Submit!</button>
                    </div>
                    <p class="font-body md:max-w-md text-gray-500 md:text-2xl">By clicking Next, you will be brought to the a good event registration system to complete the registration process for this event.</p>
                </div>

            </form>
        </div>

    </div>
@endsection