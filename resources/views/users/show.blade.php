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
                        <a class="edit" href="{{ route('images.edit', $image->id) }}">Edit</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection