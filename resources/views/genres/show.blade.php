@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('genres.index') }}">Книжные жанры</a></h2>
        <h2>/</h2>
        <h2>Просмотр жанра</h2>
    </div>

    <div class="show-form-wrap">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="td-header">ИД</td>
                <td>{{ $genre->id }}</td>
            </tr>
            <tr>
                <td>Наименование</td>
                <td>{{ $genre->title }}</td>
            </tr>
            <tr>
                <td>Обновлён</td>
                <td>{{ $genre->updated_at }}</td>
            </tr>
            <tr>
                <td>Создан</td>
                <td>{{ $genre->created_at }}</td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex">
            <a class="btn" href="{{ route('genres.edit', $genre->id)}}">Изменить</a>
            <form action="{{ route('genres.delete', $genre->id )}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-delete ml-1" onclick="return confirm('Вы уверены, что хотите удалить жанр?')">
                    Удалить</button>
            </form>
        </div>
    </div>

@endsection
