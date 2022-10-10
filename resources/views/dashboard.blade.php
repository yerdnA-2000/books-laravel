@extends('layouts.main')

@section('content')
    <div>
        <h1>Панель управления</h1>
    </div>
    <div class="sections-container">
        {{--<a href="{{ route('admins.index') }}">Администраторы</a>
        <a href="{{ route('authors.index') }}">Авторы</a>
        <a href="{{ route('genres.index') }}">Книжные жанры</a>
        <a href="{{ route('books.index') }}">Книги</a>--}}
    </div>
    <div class="row" style="margin: 1rem 0">
        <div class="col-25">
            <div style="margin-bottom: 1rem">
                <span style="font-size: x-large;"><b>Мои права</b></span>
            </div>
            <div>
                <ul>
                    @foreach($permissions as $id => $title)
                        <li class="@if(in_array($id, $thisAdminPermissions)) allow-perm @else denied-perm @endif">
                            {{ $title }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
