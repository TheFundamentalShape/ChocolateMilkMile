@extends('layouts.admin.app')

@section('content')
    <div class="md:flex md:justify-between">

        <div class="bg-white rounded shadow p-4 w-full md:w-1/3">
            <h1 class="hidden md:block verygood-font text-xl">Scan QR Code</h1>
            <h1 class="md:hidden verygood-font text-xl">Enter Confirmation Code</h1>
            <div class="hidden md:block my-2">
                <qrcode-stream @decode="onDecode"></qrcode-stream>
                <p class="text-sm text-gray-500 text-center font-semibold my-4">OR</p>
            </div>

            <div>
                <input class="w-full px-4 py-2 rounded border" placeholder="Enter confirmation number" v-model="confirmation_number" type="text">
                <button class="bg-blue-500 hover:bg-blue-700 rounded shadow text-white text-2xl px-6 py-3 w-full mt-2" v-on:click="onDecode(confirmation_number)">Find Registrant</button>
            </div>

        </div>

        <registration-information @checked-in="updateRegistration" v-bind:registration="registration" v-bind:event="event"></registration-information>

    </div>
@endsection