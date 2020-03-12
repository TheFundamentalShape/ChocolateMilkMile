@extends('layouts.page')

@section('title')
    Contact Us!
@endsection

@section('content')

    <div id="head">
        <div class="text-center mt-16 md:mt-32 lg:mx-auto p-4 max-w-2xl">
            <h1 class="text-brown fat-font text-5xl md:text-6xl">Have a question?</h1>
            <p class="text-brown text-3xl md:text-4xl lg:text-5xl skippy-font">Feel Free to reachout! We’ll get back to you as soon as we possibly can.</p>
            <p class="text-gray-600 skippy-font text-2xl md:text-3xl font-body">(You can use the form below to reach us!)</p>
        </div>
    </div>

        <div class="flex justify-center ">
            <form class="w-3/4" action="/contact" method="post">

                @csrf

                @if ($errors->any())
                    <div class="bg-yellow-500 rounded shadow-2xl p-4 mt-4">
                        <h1 class="fat-font text-2xl">Hmm... Something went wrong.</h1>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li class="skippy-font font-xl">{{ $error }}</li>
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
                        <label class="skippy-font text-3xl pr-12" for="">What is your name?</label>
                    </div>
                    <input placeholder="" class="fat-font text-black border rounded p-2 w-full" type="text" name="name">
                </div>

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">What is your email?</label>
                    </div>
                    <input class="fat-font text-black border rounded p-2 w-full" placeholder="" type="email" name="email">
                </div>

                <div class="my-8">
                    <div>
                        <label class="skippy-font text-3xl pr-12" for="">What are ya inquiring about?</label>
                    </div>
                    <textarea rows="4" placeholder="Does chocolate milk come from brown cows?" name="message" class="fat-font text-black-50 border rounded p-2 w-full">Confirmation Number: @if(isset($_GET['confirmationNumber'])){{ $_GET['confirmationNumber'] }}@endif</textarea>
                </div>

                <div class="my-8 flex justify-between">
                    <div class="pr-4">
                        <button type="submit" class="inline-block rounded px-12 py-3 fat-font text-2xl text-white bg-brown w-full hover:bg-dark-brown">Submit!</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
