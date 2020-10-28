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
                        ~ {{ $image->created_at }}
                    </p>
                    <p>{!! nl2br(e($image->desc)) !!}</p>
                    @if(!Auth::guest() && $image->user->id == Auth::user()->id)
                        <a class="edit" href="{{ route('images.edit', $image->id) }}">Edit</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @if($images->hasPages())
        <div class="paginator">
            {{ $images->links() }}
        </div>
    @endif
@endsection