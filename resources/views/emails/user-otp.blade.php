@component('mail::message')
    <h1>Hi {{ $data['name'] }}</h1>

    Use the following one-time password (OTP) to prove your identity.This OTP is valid for 10 minutes

    {{ $data['otp'] }}

    Thanks,

    ExvisasTeam
    
@endcomponent

