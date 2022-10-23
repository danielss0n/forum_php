<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/thread.css">
        <script src="/js/app.js"></script>

    </head>
    <body>
    
    
    <div class="content">
        <div class="boards">
            <p>Boards</p>
            <ul>
                @foreach($boards as $board)
                    <li><a href="/boards/{{$board->name}}">{{$board->name}}</a></li>
                @endforeach
            </ul>
        </div>

        <main>
            <nav id="navbar" class="navbar">
                <ul class="navbar">
                    <li class="">
                        <a href="/" class="nav-link">Umbralchan</a>
                    </li>
                    <li class="">
                        <a href="/admin" class="nav-link">Admin</a>
                    </li>
                </ul>
            </nav>
                @yield('content')
        </main>
    </div>
    
    
    <footer>
        
    </footer>
</body>
</html>
