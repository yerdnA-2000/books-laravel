<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function showFormLogin()
    {
        if (Auth::check()) {
            Auth::logout();
            Session::flush();
            return to_route('home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }

        $data = $request->validated();

        if (Auth::attempt($data)) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
