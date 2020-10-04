@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>{{ $user->name }}</h2>
    </div>
    <div class="image-list">
        @foreach($images as $image)
            <div class="image-container">
                <div class="thumb-container">
                    <a href="{{ asset('/storage/'.$image->url) }}">
                        <img src="{{ asset('/storage/'.$image->url) }}">
                    </a>
                </div>
                <div class="description">
                    <p>{{ $image->desc }}</p>
                    @if($user->id == Auth::user()->id)
                        <form method="post", action="/images/{{ $image->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="delete">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection