@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('genres.index') }}">Книги</a></h2>
        <h2>/</h2>
        <h2><a href="{{ route('genres.show', $genre->id) }}">Просмотр жанра</a></h2>
        <h2>/</h2>
        <h2>Изменение жанра</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('genres.update', $genre->id) }}" method="post">
            @csrf
            @method('PATCH')
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="td-header">ИД</td>
                    <td>{{ $genre->id }}</td>
                </tr>
                <tr>
                    <td>Наименование</td>
                    <td>
                        <input type="text" name="title" class="form-control"
                               value="@if ( old('title') ){{ old('title') }}@else{{ $genre->title }}@endif">
                        @error('title')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" hidden name="id" value="{{ $genre->id }}">
            <button class="btn" type="submit">Сохранить</button>
        </form>
    </div>

@endsection

