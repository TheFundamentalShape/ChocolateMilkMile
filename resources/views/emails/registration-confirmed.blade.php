@component('mail::message')
# Hi there, {{ \Illuminate\Support\Facades\Auth::user()->name }}.

We're so glad you registered for <b>{{ $registration->event->title }}</b>.

Your confirmation number for this event is <b>{{ $registration->confirmation_number }}.</b>
To make for a seamless check-in experience, you can simply bring the QR code the
day of the event, and we'll scan you in.

{!! QrCode::size(250)->generate("$registration->confirmation_number") !!}

You can view your registrations at any time by clicking here and logging into your account.

@component('mail::button', ['url' => route('registration.index')])
View your Registrations
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
