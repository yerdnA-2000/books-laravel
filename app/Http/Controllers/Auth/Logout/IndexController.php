<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        Auth::logout();

        return to_route('users.login');
    }
}
