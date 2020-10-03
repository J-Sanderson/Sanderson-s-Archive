@extends('layouts.layout')

@section('content')
<h2>{{ __('Reset Password') }}</h2>

@if (session('status'))
    <div role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="form">
    @csrf

    <label for="email">
        {{ __('E-Mail Address') }}
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    </label>

    @error('email')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <button type="submit">
        {{ __('Send Password Reset Link') }}
    </button>
</form>
@endsection
