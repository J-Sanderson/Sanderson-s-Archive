@extends('layouts.layout')

@section('content')
    <div class="intro">
        <h2>Users</h2>
    </div>

    <div class="user-list">
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a> ~ {{ count($user->images) }} 
                    @if( count($user->images) === 1 )
                        image
                    @else
                        images
                    @endif
                     uploaded
                </li>
            @endforeach
        </ul>
    </div>
@endsection