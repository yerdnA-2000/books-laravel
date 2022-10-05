<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttemptController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('dashboard'));
        }

        $fields = $request->only(['email', 'password']);

        if (Auth::attempt($fields)) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect(route('users.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
