@extends('layouts.layout')

@section('content')
    <h2>Users</h2>
    <ul>
        @foreach($users as $user)
            <li>
                <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection