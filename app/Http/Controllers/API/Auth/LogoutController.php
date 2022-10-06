<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        //Auth::logout();

        return response()->json(['message' => 'Вы успешно вышли из аккаунта', 'user' => Auth::guard('api')->check()]);
    }
}
