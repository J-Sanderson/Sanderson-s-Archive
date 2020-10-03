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
                <li><a href="#">Home</a> ~</li>
                <li><a href="#">Users</a> ~</li>
                <li><a href="#">Latest</a></li>
            </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>J. Sanderson 2020</footer>

    </body>
</html>

