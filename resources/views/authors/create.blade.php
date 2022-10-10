@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('authors.index') }}">Авторы</a></h2>
        <h2>/</h2>
        <h2>Создание нового автора</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('authors.store') }}" method="post">
            @csrf

            @method('POST')
            <div class="col-50">
                <div class="row flex-column">
                    <div class="form-group">
                        <input type="text" name="full_name" class="form-control" placeholder="ФИО" value="{{old('full_name')}}">
                        @error('full_name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Пароль" value="{{old('password')}}">
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <select name="roles[]" class="form-control disabled">
                            <option selected value="{{ $role->id }}">{{ $role->title }}</option>
                        </select>
                    </div>
                </div>
                <button class="btn" type="submit">Сохранить</button>
            </div>

        </form>
    </div>

@endsection
