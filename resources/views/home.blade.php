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

                    <h2>Settings</h2>

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

                    <!-- TODO add 'are you sure' confirmation -->
                    <h2>Delete your account</h2>
                    <form method="POST" action="{{ route('users.destroy', Auth::user()->id )}}" class="form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
