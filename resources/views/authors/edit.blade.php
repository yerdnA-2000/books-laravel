@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('authors.index') }}">Авторы</a></h2>
        <h2>/</h2>
        <h2><a href="{{ route('authors.show', $author->id) }}">Просмотр автора</a></h2>
        <h2>/</h2>
        <h2>Изменение автора</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('authors.update', $author->id) }}" method="post">
            @csrf
            @method('PATCH')
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="td-header">ИД автора</td>
                    <td>{{ $author->id }}</td>
                </tr>
                <tr>
                    <td>ФИО</td>
                    <td>
                        <input type="text" name="full_name" class="form-control"
                               value="@if ( old('full_name') ){{ old('full_name') }}@else{{ $author->full_name }}@endif">
                        @error('full_name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>ИД пользователя</td>
                    <td>{{ $author->user->id }}</td>
                </tr>
                <tr>
                    <td>Email пользователя</td>
                    <td>
                        {{--<input type="email" name="email" class="form-control" value="{{ $author->user->email }}">--}}
                        {{ $author->user->email }}
                    </td>
                </tr>
                </tbody>
            </table>
            <button class="btn" type="submit">Сохранить</button>
        </form>
    </div>

@endsection

