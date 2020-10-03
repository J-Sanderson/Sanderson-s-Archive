@extends('layouts.layout')

@section('content')
<h2>{{ __('Register') }}</h2>
<form method="POST" action="{{ route('register') }}" class="form">
    @csrf
        <label for="name" >
            <span>{{ __('Name') }}</span>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </label>

        @error('name')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="email" >
            <span>{{ __('E-Mail Address') }}</span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </label>

        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password">
            <span>{{ __('Password') }}</span>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        </label>

        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password-confirm">
            <span>{{ __('Confirm Password') }}</span>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </label>

        <button type="submit">
            {{ __('Register') }}
        </button>
</form>
@endsection
