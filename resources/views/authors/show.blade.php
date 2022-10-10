@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('authors.index') }}">Авторы</a></h2>
        <h2>/</h2>
        <h2>Просмотр автора</h2>
    </div>

    <div class="show-form-wrap">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="td-header">ИД автора</td>
                <td>{{ $author->id }}</td>
            </tr>
            <tr>
                <td>ФИО</td>
                <td>{{ $author->full_name }}</td>
            </tr>
            <tr>
                <td>Кол-во книг</td>
                <td>{{ $author->books_count }}</td>
            </tr>
            <tr>
                <td>ИД пользователя</td>
                <td>{{ $author->user->id }}</td>
            </tr>
            <tr>
                <td>Email пользователя</td>
                <td>{{ $author->user->email }}</td>
            </tr>
            <tr>
                <td>Обновлён</td>
                <td>{{ $author->updated_at }}</td>
            </tr>
            <tr>
                <td>Создан</td>
                <td>{{ $author->created_at }}</td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex">
            <a class="btn" href="{{ route('authors.edit', $author->id)}}">Изменить</a>
            <form action="{{ route('authors.delete', $author->id )}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-delete ml-1"
                        onclick="return confirm('При удалении автора, удалятся все его книги и пользователь. Продолжить?')">
                    Удалить</button>
            </form>
        </div>
    </div>

@endsection
