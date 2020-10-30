@extends('layouts.layout')

@section('content')
<div class="intro">
    <h2>{{ __('Login') }}</h2>
</div>
<form method="POST" action="{{ route('login') }}" class="form">
    @csrf
    <label for="email">
        <span>{{ __('E-Mail Address') }}</span>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    </label>

    @error('email')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password">
        <span>{{ __('Password') }}</span>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    </label>

    @error('password')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="remember">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        {{ __('Remember Me') }}
    </label>

    <button type="submit" class="button">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
@endsection
