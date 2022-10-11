<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Вы уже авторизованы']);
        }

        $data = $request->validated();

        if (Auth::attempt($data)) {
            Auth::user()->createNewApiToken();

            return response()->json(['message' => 'Вы успешно авторизованы', 'user' => new UserResource(Auth::user())]);
        }

        return response()->json(['message' => 'Ошибка авторизации. Неправильные email или пароль'], 401);
    }
}
