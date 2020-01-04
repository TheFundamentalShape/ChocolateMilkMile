@extends('layouts.app')

@section('content')
    <h1 class="text-5xl verygood-font">Awesome sauce. Here is the event that you're registering for.</h1>

    <div class="mt-10 bg-white rounded shadow p-8">
        <h1 class="verygood-font text-4xl">{{ $event->title }}</h1>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ $event->formatted_date }}</p>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ $event->location }}</p>
        <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ $event->formatted_price }}</p>
    </div>

    <div class="text-lg text-gray-600 mt-8">
        <p class="my-2">To complete your registration, please provide the registrant information below, and your payment details, and then hit “Register!”</p>
    </div>

    <div class="mt-8">
        <form action="/events/{{ $event->id }}/register" method="post" id="payment-form">

            @csrf

            @if(\Illuminate\Support\Facades\Session::has('payment_error'))
                <div class="bg-red-500 rounded p-4 shadow my-2 text-white">
                    <h3>{{ \Illuminate\Support\Facades\Session::get('payment_error') }}</h3>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-500 rounded p-4 shadow my-2 text-white">
                    <h3 class="text-xl verygood-font">Something went wrong...</h3>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="my-4">
                <label class="text-lg text-gray-600" for="card-element">
                    Registrant name
                </label>
                <input placeholder="John Doe" name="name" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
            </div>

            <div class="my-4">
                <label class="text-lg text-gray-600" for="card-element">
                    Registrant email
                </label>
                <input placeholder="johndoe@gmail.com" name="email" type="email" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
            </div>

            <div class="my-4">

                <label class="text-lg text-gray-600" for="card-element">
                    Credit or debit card
                </label>

                <div class="bg-white rounded p-4 mt-2 shadow">
                    <div id="card-element" style="">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                </div>

                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>

            </div>

            <button class="bg-blue-500 hover:bg-blue-700 w-1/3 rounded px-4 py-2 text-white mt-4 shadow">Register</button>
        </form>

        <script>
            // Set your publishable key: remember to change this to your live publishable key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            var stripe = Stripe('pk_test_npgHJYXNKJ7Z0bm9RkGGUQa600nY0T59kW');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '16px',
                    color: "#32325d",
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the customer that there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_token');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        </script>

    </div>

@endsection
