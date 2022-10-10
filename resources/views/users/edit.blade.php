@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('admins.index') }}">Администраторы</a></h2>
        <h2>/</h2>
        <h2><a href="{{ route('admins.show', $admin->id) }}">Просмотр администратора</a></h2>
        <h2>/</h2>
        <h2>Изменение администратора</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('admins.update', $admin->id) }}" method="post">
            @csrf
            @method('PATCH')
            @if (isset($errors) && count($errors))

                There were {{count($errors->all())}} Error(s)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>

            @endif
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="td-header">ИД пользователя</td>
                    <td>{{ $admin->id }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" class="form-control"
                               value="@if ( old('email') ){{ old('email') }}@else{{ $admin->email }}@endif">
                        @error('email')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td>
                        <input type="password" name="password" class="form-control" placeholder="Новый пароль"
                               value="">
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Назначение прав</td>
                    <td>
                        <select name="permissions[]" class="form-control" multiple="multiple"
                                data-placeholder="Назначьте права">
                            @foreach($permissions as $id => $title)
                                <option value="{{ $id }}" @if(in_array($id, $thisAdminPermissions)) selected @endif>
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                        @error('permissions')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" hidden name="id" value="{{ $admin->id }}">
            <button class="btn" type="submit">Сохранить</button>
        </form>
    </div>

@endsection

