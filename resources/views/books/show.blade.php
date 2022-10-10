@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('books.index') }}">Книги</a></h2>
        <h2>/</h2>
        <h2>Просмотр книги</h2>
    </div>

    <div class="show-form-wrap">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="td-header">ИД книги</td>
                <td>{{ $book->id }}</td>
            </tr>
            <tr>
                <td>Наименование</td>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <td>ИД автора</td>
                <td>{{ $book->author_id }}</td>
            </tr>
            <tr>
                <td>ФИО автора</td>
                <td>{{ $book->author->full_name }}</td>
            </tr>
            <tr>
                <td>Книжные жанры</td>
                <td>
                    @foreach($book->genres as $genre)
                        @if ($loop->last) {{$genre->title}} @else {{$genre->title}}, @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Обновлена</td>
                <td>{{ $book->updated_at }}</td>
            </tr>
            <tr>
                <td>Создана</td>
                <td>{{ $book->created_at }}</td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex">
            <a class="btn" href="{{ route('books.edit', $book->id)}}">Изменить</a>
            <form action="{{ route('books.delete', $book->id )}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-delete ml-1" onclick="return confirm('Вы уверены, что хотите удалить книгу?')">
                    Удалить</button>
            </form>
        </div>
    </div>

@endsection
