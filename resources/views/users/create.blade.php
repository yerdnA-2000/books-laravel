@extends('layouts.main')

@section('content')
    <div class="section-header">
        <h2><a href="{{ route('admins.index') }}">Администраторы</a></h2>
        <h2>/</h2>
        <h2>Создание нового администратора</h2>
    </div>

    <div class="form-wrap">
        <form action="{{ route('admins.store') }}" method="post">
            @csrf

            @method('POST')
            <div class="col-50">
                <div class="row flex-column">
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
                        @error('roles')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="permissions"><b>Назначение прав</b></label>
                        <select name="permissions[]" class="form-control" multiple="multiple"
                                data-placeholder="Назначьте права" id="permissions">
                            @foreach($permissions as $id => $title)
                                <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                        @error('permissions')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn" type="submit">Сохранить</button>
            </div>
        </form>
    </div>

@endsection
