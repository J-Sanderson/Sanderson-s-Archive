@extends('layouts.layout')

@section('content')
<div class="intro">
    <h2>{{ __('Reset Password') }}</h2>
</div>

@if (session('status'))
    <div role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="form">
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

    <button type="submit" class="button">
        {{ __('Send Password Reset Link') }}
    </button>
</form>
@endsection
