<?php

namespace App\Http\Controllers\API\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Вы уже авторизованы']);
        }
        return true;
    }
}
