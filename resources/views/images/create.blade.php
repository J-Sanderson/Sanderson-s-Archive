@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>Upload an image</h2>
    </div>

    <form enctype="multipart/form-data" action="{{ route('images.store') }}" method="post" class="form">
        @csrf
        <!-- TODO style the upload -->
        <label for="image">
            <span>Select file</span>
            <input id="file" type="file" name="image" accept="image/*" required>
        </label>
        <label for="desc">
            <span>Description (optional):</span>
            <textarea id="desc" name="desc"></textarea>
        </label>
        <button type="submit" class="button">
            Upload
        </button>
    </form>
@endsection