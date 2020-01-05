@extends('layouts.admin.app')

@section('content')
    <div class="md:flex md:justify-between">

        <div class="bg-white rounded shadow p-4 w-full md:w-1/3">
            <h1 class="hidden md:block verygood-font text-xl">Scan QR Code</h1>
            <h1 class="md:hidden verygood-font text-xl">Enter Confirmation Code</h1>
            <div class="hidden md:block my-2">
                <qrcode-stream @decode="onDecode"></qrcode-stream>
            </div>

        </div>

        <registration-information v-bind:registration="registration" v-bind:event="event"></registration-information>

    </div>
@endsection