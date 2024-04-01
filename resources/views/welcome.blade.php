<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Converge</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="d-flex flex-column justify-content-between min-vh-100">

    <header class="d-flex justify-content-between align-items-center py-3 px-5">
        <div class="text-center">
            <h1>Converge</h1>
            <p class="lead">Your one-stop solution for all your needs</p>
        </div>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            @endauth
        @endif
    </header>

    <main class="container my-5">
        <section class="text-center">
            <h2>What our users say</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Converge is the best! I can't imagine my life without it."</p>
                        <footer class="blockquote-footer">John Doe</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"I love Converge! It's so easy to use and it has everything I need."</p>
                        <footer class="blockquote-footer">Jane Smith</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"I highly recommend Converge. It's a game changer."</p>
                        <footer class="blockquote-footer">Bob Johnson</footer>
                    </blockquote>
                </div>
            </div>
        </section>
    </main>

</body>

</html>