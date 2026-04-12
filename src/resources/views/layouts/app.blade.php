<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a class="header__logo-link" href="/">FashionablyLate</a>
            </h1>
            <nav class="header__nav">
                @if(Request::is('register'))
                    <a href="/login">login</a>
                @elseif(Request::is('login'))
                    <a href="/register">register</a>
                @elseif(Request::is('admin') || Request::is('search'))
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">logout</button>
                    </form>
                @endif
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

</body>

</html>