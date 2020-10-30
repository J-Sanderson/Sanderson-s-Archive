@extends('layouts.layout')

@section('content')
<div class="intro">
<h2>Welcome, {{ Auth::user()->name }}.</h2>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <p>
        <a href="{{ route('users.show', Auth::user()->id) }}">Your gallery</a>
    </p>

</div>

    <form method="POST" action="{{ route('users.update', Auth::user()->id )}}" class="form">
        @csrf
        <h3>Settings</h3>
        <label for="show-email">
            <input type="checkbox" name="showEmail"
                @if(Auth::user()->showEmail)
                    checked
                @endif
            >
            Show email on profile page
        </label>
        <label for="website">
            <span>Your website (optional):</span>
            <input type="text" name="website" value="{{ Auth::user()->website }}">
        </label>
        <label for="bio">
            <span>Your bio (optional):</span>
            <textarea id="bio" name="bio">{{ Auth::user()->bio }}</textarea>
        </label>
        <button type="submit" class="button">Update</button>
    </form>

    <h3>Delete your account</h3>
    <p>CAUTION! This button will delete your account and all your images. Proceed with care!</p>
    <form method="POST" action="{{ route('users.destroy', Auth::user()->id )}}">
        @csrf
        @method('DELETE')
        <button 
            type="submit" 
            class="button danger"
            onClick="return confirm('Are you sure? Your account and images will be PERMANENTLY deleted!')"
        >
            Delete
        </button>
    </form>
@endsection
