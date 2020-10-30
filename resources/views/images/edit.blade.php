@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>Edit image</h2>
    </div>
    
    <form method="post" action="{{ route('images.update', $image->id) }}" class="form">
        @csrf
        @method('PUT')
        <img src="{{ asset('/storage/'.$image->url) }}">
        <label for="desc">
            <span>Description</span>
            <textarea id="desc" name="desc">{{ $image->desc }}</textarea>
        </label>
        <button type="submit">Edit</button>
    </form>
    <form method="post", action="{{ route('images.destroy', $image->id) }}">
        @csrf
        @method('DELETE')
        <h3>Delete this image</h3>
        <p>CAUTION! This button will permanently delete this image. You will need to reupload it if you change your mind.</p>
        <button 
            type="submit" 
            class="delete"
            onClick="return confirm('Are you sure? This will permanently delete this image.')"
        >
            Delete
        </button>
    </form>
@endsection