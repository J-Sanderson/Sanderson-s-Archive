@extends('layouts.layout')

@section('content')
<h2">{{ __('Reset Password') }}</h2>
<form method="POST" action="{{ route('password.update') }}" class="form">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <label for="email">{{ __('E-Mail Address') }}</label>

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password">{{ __('Password') }}</label>

    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password-confirm">{{ __('Confirm Password') }}</label>

    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

    <button type="submit">
        {{ __('Reset Password') }}
    </button>
</form>
@endsection
