@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>Latest images</h2>
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
                    <p>
                        <a href="{{ route('users.show', $image->user->id) }}">
                            {{ $image->user->name }}
                        </a>
                    </p>
                    <p>{{ $image->desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection