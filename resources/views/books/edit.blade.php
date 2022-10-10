@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('books.index') }}">Книги</a></h2>
        <h2>/</h2>
        <h2><a href="{{ route('books.show', $book->id) }}">Просмотр книги</a></h2>
        <h2>/</h2>
        <h2>Изменение книги</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('books.update', $book->id) }}" method="post">
            @csrf
            @method('PATCH')
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="td-header">ИД</td>
                    <td>{{ $book->id }}</td>
                </tr>
                <tr>
                    <td>Наименование</td>
                    <td>
                        <input type="text" name="title" class="form-control"
                               value="@if ( old('title') ){{ old('title') }}@else{{ $book->title }}@endif">
                        @error('title')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Автор</td>
                    <td>
                        <select name="author_id" class="form-control">
                            @foreach($authors as $id => $name)
                                <option value="{{ $id }}" @if($id == $book->author_id)
                                selected @endif >
                                    {{ $name }} - {{ $id }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Жанры</td>
                    <td>
                        <select name="genres[]" class="form-control" multiple="multiple" data-placeholder="Выберите жанры">
                            @foreach($genres as $id => $title)
                                <option value="{{ $id }}" @if(in_array($id, $thisBookGenres)) selected @endif >
                                    {{ $title }}</option>
                            @endforeach
                        </select>
                        @error('genres')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                </tbody>
            </table>
            <button class="btn" type="submit">Сохранить</button>
        </form>
    </div>

@endsection

