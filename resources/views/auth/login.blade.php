<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация администратора</title>

    @vite(['resources/css/app.css'])
</head>
<body class="login-body">
<div class="wrap">
    <div class="mt-1 d-flex flex-column" style="position: absolute; top: 3rem">
        <span>Email: admin@test.com</span>
        <span>Пароль: admin</span>
    </div>
    <main class="login-wrap">
        <div class="login-head">
            <h1>Вход<br>администратора</h1>

        </div>
        <form class="login-form" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Пароль">
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn" type="submit" >Войти</button>
        </form>
    </main>
</div>

@vite(['resources/js/app.js'])

</body>
</html>
