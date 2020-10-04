@extends('layouts.layout')

@section('content')
    <h2>Upload an image</h2>
    <form enctype="multipart/form-data" action="/upload" method="post" class="form">
        @csrf
        <label for="image">
            <span>Select file</span>
            <input id="file" type="file" name="image" accept="image/*" required>
        </label>
        <button type="submit">
            Upload
        </button>
    </form>
@endsection