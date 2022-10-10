@extends('layouts.main')

@section('content')
    <h1>Администраторы</h1>
    <div class="form-wrap">
        <form action="{{ route('admins.store') }}"></form>
    </div>

    <div class="show-form-wrap">
        <div class="mb-1">
            <a class="btn" href="{{ route('admins.create') }}">Создать +</a>
            <span class="count-items"><b>Всего администраторов: {{ $adminsCount }}</b></span>
        </div>
        <table class="table table-bordered">
            <tbody>
            <thead>
            <tr>
                <th>ИД пользователя</th>
                <th>Email</th>
                <th>Обновлён</th>
                <th>Создан</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>
                        <a href="{{ route('admins.show', $admin->id) }}">{{ $admin->email }}</a>
                    </td>
                    <td>
                        {{ $admin->updated_at }}
                    </td>
                    <td>
                        {{ $admin->created_at }}
                    </td>
                    <td>
                        @if($admin->isOnline()) <span class="online">Online</span>
                        @else <span class="offline">Offline</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
