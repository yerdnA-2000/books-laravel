<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $admins = User::whereHas('roles', function($q) {
            $q->where('slug', 'admin');
        })->get();

        $adminsCount = $admins->count();

        return view('users.index', compact('admins', 'adminsCount'));
    }
}
