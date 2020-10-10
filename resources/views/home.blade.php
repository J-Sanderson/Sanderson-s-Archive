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
                    <!-- TODO add user details, bio, name, email etc, update here -->
                    <h2>Settings</h2>
                    <form method="POST" action="{{ route('users.update', Auth::user()->id )}}">
                        @csrf
                        <label for="show-email">
                            <span>Show email on profile page</span>
                            <input type="checkbox" name="showEmail"
                                @if(Auth::user()->showEmail)
                                    checked
                                @endif
                            >
                        </label>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
