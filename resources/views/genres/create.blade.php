@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('genres.index') }}">Книжные жанры</a></h2>
        <h2>/</h2>
        <h2>Создание нового жанра</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('genres.store') }}" method="post">
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
                </div>
                <button class="btn" type="submit">Сохранить</button>
            </div>

        </form>
    </div>

@endsection
