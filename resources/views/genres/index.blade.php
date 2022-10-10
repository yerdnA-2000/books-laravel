@extends('layouts.main')

@section('content')
    <h1>Книжные жанры</h1>
    <div class="form-wrap">
        <form action="{{ route('genres.store') }}"></form>
    </div>

    <div class="show-form-wrap">
        <div class="mb-1">
            <a class="btn" href="{{ route('genres.create') }}">Создать +</a>
            <span class="count-items"><b>Всего жанров: {{ $genresCount }}</b></span>
        </div>
        <table class="table table-bordered">
            <tbody>
            <thead>
            <tr>
                <th>ИД</th>
                <th>Наименование</th>
                <th>Обновлён</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>
                        <a href="{{ route('genres.show', $genre->id) }}">{{ $genre->title }}</a>
                    </td>
                    <td>{{ $genre->updated_at }}</td>
                    <td>{{ $genre->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
