<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
    <title>Laravel project - @yield('title')</title>
</head>

<body>
    <header class="d-flex justify-content-between align-items-center p-3">
        <h1 class="h3">Converge</h1>
        @auth
        <a href="{{ route('home.create') }}" class="btn btn-primary mr-5">Create Conference</a>
        @endauth
        @guest
        <a href="{{ route('login') }}">Login</a>
        @else
        <div class="d-flex align-items-center">

            <span class="welcome-text">Welcome, {{ auth()->user()->name }}</span>

            <a href="{{ route('logout') }}" id="logout-btn" class="gg-log-out ml-3"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                @csrf
            </form>
        </div>
        @endguest
    </header>
    <main class="py-3">
        <div id="home-conf-card"></div>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>