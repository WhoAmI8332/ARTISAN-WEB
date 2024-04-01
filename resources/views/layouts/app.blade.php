<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Laravel project - @yield('title')</title>
</head>
<body>
    <header class="m-10">
        @guest
            <a href="{{ route('login') }}">Login</a>
        @else
            <a href="{{ route('logout') }}" id="logout-btn">Logout ({{ auth()->user()->name }})</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                @csrf
            </form>
        @endguest
    </header>
    <main class="py-3">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
