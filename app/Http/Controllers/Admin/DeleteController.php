<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke(User $admin)
    {
        if (!Auth::user()->can('delete-admins') || Auth::id() == $admin->id) {
            abort(403, 'НЕТ ПРАВ');
        }

        $admin->delete();

        return to_route('admins.index');
    }
}
