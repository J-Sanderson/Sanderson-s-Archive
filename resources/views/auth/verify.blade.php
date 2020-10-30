@extends('layouts.layout')

@section('content')
<div class="intro">
    <h2>{{ __('Verify Your Email Address') }}</h2>
</div>

@if (session('resent'))
    <div role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif

<form class="form" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <p>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
    </p>
    <button type="submit" class="button">{{ __('click here to request another') }}</button>
</form>
@endsection
