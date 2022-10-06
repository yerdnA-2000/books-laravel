<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Вы уже авторизованы']);
        }

        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($data)) {
            return response()->json(['message' => 'Вы успешно авторизованы', 'user' => Auth::user()]);
        }

        return response()->json(['message' => 'Ошибка авторизации'], 401);
    }
}
