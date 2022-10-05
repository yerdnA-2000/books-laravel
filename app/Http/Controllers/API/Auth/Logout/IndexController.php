<?php

namespace App\Http\Controllers\API\Auth\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {

        //Auth::logout();

        return response()->json(['message' => 'Вы успешно вышли из аккаунта', 'user' => Auth::guard('api')->check()]);
    }
}
