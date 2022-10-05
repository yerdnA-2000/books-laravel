<?php

namespace App\Http\Controllers\API\Auth\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            return to_route('dashboard');
        }
        return view('auth.registration');
    }
}
