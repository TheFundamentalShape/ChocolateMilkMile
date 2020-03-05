@extends('layouts.app')

@section('content')

    <h1 class="text-3xl md:text-5xl md:max-w-2xl verygood-font">Hey there {{ Auth::user()->name }}, here are your registrations.</h1>

    <user-registrations></user-registrations>

@endsection
