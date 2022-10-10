@extends('layouts.main')

@section('content')
    <h1>Книги</h1>
    <div class="form-wrap">
        <form action="{{ route('books.store') }}"></form>
    </div>

    <div class="show-form-wrap">
        <div class="mb-1">
            <a class="btn" href="{{ route('books.create') }}">Создать +</a>
            <span class="count-items"><b>Всего книг: {{ $booksCount }}</b></span>
        </div>
        <table class="table table-bordered">
            <tbody>
            <thead>
            <tr>
                <th>ИД</th>
                <th>Наименование</th>
                <th>Автор</th>
                <th>Книжные жанры</th>
                <th>Обновлена</th>
                <th>Создана</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                    <td>{{ $book->author->full_name }}</td>
                    <td>
                        @foreach($book->genres as $genre)
                            @if ($loop->last) {{$genre->title}} @else {{$genre->title}}, @endif
                        @endforeach
                    </td>
                    <td>{{ $book->updated_at }}</td>
                    <td>{{ $book->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
