@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>{{ $user->name }}</h2>
        @if($user->showEmail)
            <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
        @endif
        @if($user->bio)
            <p>{!! nl2br(e($user->bio)) !!}</p>
        @endif
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
                    <p>{!! nl2br(e($image->desc)) !!}</p>
                    @if(!Auth::guest() && $user->id == Auth::user()->id)
                        <a class="edit" href="{{ route('images.edit', $image->id) }}">Edit</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="paginator">
        {{ $images->links() }}
    </div>
@endsection