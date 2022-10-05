<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Регистрация администратора</title>
</head>
<body>
<div style="display: flex; flex-direction: column; align-items: center">
    <h1>Регистрация</h1>
    <form action="{{ route('users.registration.store') }}" method="post">
        @csrf

        @method('POST')
        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
        <div>{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Пароль">
        @error('password')
        <div>{{ $message }}</div>
        @enderror

        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>

