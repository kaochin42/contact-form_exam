<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @stack('styles')
</head>

<body>
    <header class="header">
        <p class="header-logo">FashionablyLate</p>
        <nav class="header-nav">
            @auth
            @if(Request::is('admin*') || Request::is('search'))
            <form action="/logout" method="post" class="header-form">
                @csrf
                <button type="submit" class="header-btn">logout</button>
            </form>
            @endif
            @else
            @if(Request::is('register'))
            <a href="/login" class="header-btn">login</a>
            @elseif(Request::is('login'))
            <a href="/register" class="header-btn">register</a>
            @endif
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>