@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('admins.index') }}">Администраторы</a></h2>
        <h2>/</h2>
        <h2>Просмотр администратора</h2>
    </div>

    <div class="show-form-wrap">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="td-header">ИД пользователя</td>
                <td>{{ $admin->id }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $admin->email }}</td>
            </tr>
            <tr>
                <td>Права</td>
                <td>
                    @foreach($admin->permissions as $perm)
                        @if ($loop->last) {{$perm->title}} @else {{$perm->title}}, @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Обновлён</td>
                <td>{{ $admin->updated_at }}</td>
            </tr>
            <tr>
                <td>Создан</td>
                <td>{{ $admin->created_at }}</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>
                    @if($admin->isOnline()) <span class="online">Online</span>
                    @else <span class="offline">Offline</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex">
            <a class="btn" href="{{ route('admins.edit', $admin->id)}}">Изменить</a>
            <form action="{{ route('admins.delete', $admin->id )}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-delete ml-1"
                        onclick="return confirm('Вы уверены, что хотите удалить администратора?')">
                    Удалить</button>
            </form>
        </div>
    </div>

@endsection
