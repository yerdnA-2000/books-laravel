@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('books.index') }}">Книги</a></h2>
        <h2>/</h2>
        <h2>Создание новой книги</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('books.store') }}" method="post">
            @csrf

            @method('POST')
            <div class="col-50">
                <div class="row flex-column">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{old('title')}}">
                        @error('title')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="author_id" class="form-control">
                            <option selected="selected" disabled>Выберите автора</option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->full_name}}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="genres[]" class="form-control" multiple="multiple"
                                data-placeholder="Выберите жанры">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->title}}</option>
                            @endforeach
                        </select>
                        @error('genres')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn" type="submit">Сохранить</button>
            </div>

        </form>
    </div>

@endsection
