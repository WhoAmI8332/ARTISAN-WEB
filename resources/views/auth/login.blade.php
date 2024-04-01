<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="login__body">
    <form class="login__form" action="{{ route('login') }}" method="POST">
        <div class="login__div">
            <h1>Login</h1>
        </div>
        @csrf
        <div class="login__div">
            <label class="login__label" for="title-input">Username</label>
            <input class="login__input" type="text" name="username" id="title-input" value="{{ old('username') }}">
            @error('username')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="login__div">
            <label class="login__label" for="password-input">Password</label>
            <input class="login__input" type="password" name="password" id="password-input" value="{{ old('password') }}">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="login__div">
            <label class="login__label" for="remember-input">Remember me</label>
            <input type="checkbox" name="remember" id="remember-input" value="1" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <div class="login__div">
            <input class="login__submit" type="submit" value="Login">
        </div>
    </form>
</body>
</html>