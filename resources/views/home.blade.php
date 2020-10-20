@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h2>Welcome, {{ Auth::user()->name }}.</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('users.show', Auth::user()->id) }}">Your gallery</a>
                    </p>

                    <h3>Settings</h3>

                    <form method="POST" action="{{ route('users.update', Auth::user()->id )}}" class="form">
                        @csrf
                        <label for="show-email">
                            <span>Show email on profile page</span>
                            <input type="checkbox" name="showEmail"
                                @if(Auth::user()->showEmail)
                                    checked
                                @endif
                            >
                        </label>
                        <label for="website">Your website (optional)</label>
                        <input type="text" name="website" value="{{ Auth::user()->website }}">
                        <label for="bio">Your bio (optional)</label>
                        <textarea id="bio" name="bio">{{ Auth::user()->bio }}</textarea>
                        <button type="submit">Update</button>
                    </form>

                    <h3>Delete your account</h3>
                    <p>CAUTION! This button will delete your account and all your images. Proceed with care!</p>
                    <form method="POST" action="{{ route('users.destroy', Auth::user()->id )}}" class="form">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="delete"
                            onClick="return confirm('Are you sure? Your account and images will be PERMANENTLY deleted!')"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
