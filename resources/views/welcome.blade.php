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

    <header class="text-center py-5">
        <h1 class="home-title-big">Converge</h1>
        <p class="lead">Converge. Connect. Grow.</p>
    </header>

    <main class="container my-5">
        <div class="d-flex justify-content-center mb-5">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            @endauth
            @endif
        </div>

        <section class="text-center">
            <h2>What our users say</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"This platform is a game-changer for conference enthusiasts! I love how simple it is to find interesting virtual events AND the tools they provide to build my own conferences are incredibly user-friendly. Highly recommend!"</p>
                        <footer class="blockquote-footer">TheWebinarWiz</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Finally, a place to connect with like-minded professionals in my field. Not only have I discovered amazing webinars, but I've also forged valuable connections with people from across the globe. A must-have for those seeking professional growth."</p>
                        <footer class="blockquote-footer">EventsMadeEasy</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Love the concept, love the execution. Finding relevant conferences and setting up my own events has never been this smooth."</p>
                        <footer class="blockquote-footer">Lisa_Innovatios</footer>
                    </blockquote>
                </div>
            </div>
        </section>
    </main>

</body>

</html>