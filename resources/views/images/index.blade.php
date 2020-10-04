@extends('layouts.layout')

@section('content')
    <h2>Latest images</h2>

    @foreach($images as $image)
        <img src="{{ asset('/storage/'.$image->url) }}">
    @endforeach
    
@endsection