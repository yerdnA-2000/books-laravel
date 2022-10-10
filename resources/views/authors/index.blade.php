@extends('layouts.main')

@section('content')
    <h1>Авторы</h1>
    <div class="form-wrap">
        <form action="{{ route('authors.store') }}"></form>
    </div>

    <div class="show-form-wrap">
        <div class="mb-1">
            <a class="btn" href="{{ route('authors.create') }}">Создать +</a>
            <span class="count-items"><b>Всего авторов: {{ $authorsCount }}</b></span>
        </div>
        <table class="table table-bordered">
            <tbody>
            <thead>
            <tr>
                <th>ИД автора</th>
                <th>ФИО</th>
                <th>Кол-во книг</th>
                <th>ИД пользователя</th>
                <th>Email</th>
                <th>Обновлён</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->full_name }}</a></td>
                    <td>{{ $author->books_count }}</td>
                    <td>{{ $author->user_id }}</td>
                    <td>{{ $author->user->email }}</td>
                    <td>{{ $author->updated_at }}</td>
                    <td>{{ $author->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
