<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администратора</title>

    @vite(['resources/css/app.css'])
</head>
<body>
<div class="wrap">
    <header class="main-header">
        <menu class="header-menu">
            <li><a href="{{ route('home') }}"><b>Панель управления</b></a></li>
            <li><a href="{{ route('admins.index') }}"><b>Администраторы</b></a></li>
            <li><a href="{{ route('authors.index') }}"><b>Авторы</b></a></li>
            <li><a href="{{ route('genres.index') }}"><b>Книжные жанры</b></a></li>
            <li><a href="{{ route('books.index') }}"><b>Книги</b></a></li>
        </menu>
        <div style="margin: auto 0 auto auto">
            <a href="{{ route('admins.show', auth()->user()->id) }}">{{ auth()->user()->email }}</a>
            <a href="{{ route('logout') }}" style="margin-left: 1.5rem">Выйти</a>
        </div>
    </header>

    <main class="content-wrap">
        @yield('content')
    </main>
</div>

@vite(['resources/js/app.js'])

</body>
</html>
