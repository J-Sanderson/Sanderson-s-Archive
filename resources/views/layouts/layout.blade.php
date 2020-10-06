<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="/css/main.css" rel="stylesheet">

        <title>Sanderson's Archive</title>
    </head>

    <body>
        <header>
            <h1>Sanderson's Archive</h1>
            <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li>~ <a href="{{ route('users.index') }}">Users</a></li>
                <li>~ <a href="{{ route('images.index') }}">Latest</a></li>
            </ul>
            @guest
                <ul>
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            ~ <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            ~ <a href="{{ route('images.create') }}">Upload</a>
                        </li>
                        <li>
                            ~ <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>J. Sanderson 2020</footer>

    </body>
</html>

