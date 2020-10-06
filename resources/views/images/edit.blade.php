@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>Edit image</h2>
    </div>
    <img src="{{ asset('/storage/'.$image->url) }}">
    <form method="post" action="{{ route('images.update', $image->id) }}">
        @csrf
        @method('PUT')
        <label for="desc">Description</labeL>
        <textarea id="desc" name="desc">{{ $image->desc }}</textarea>
        <button type="submit">Edit</button>
    </form>
    <form method="post", action="{{ route('images.destroy', $image->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete">Delete</button>
    </form>
@endsection