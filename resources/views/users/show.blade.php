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
                    <p>A description will go here</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection