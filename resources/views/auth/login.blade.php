<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Авторизация администратора</title>
</head>
<body>
<div>
    <h1>Вход</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf

        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
        <div>{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Пароль">
        @error('password')
        <div>{{ $message }}</div>
        @enderror

        <button type="submit" >Войти</button>
    </form>
</div>
</body>
</html>
