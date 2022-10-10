<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        if (!Auth::user()->can('create-update-admins')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $role = Role::where('slug', 'admin')->first();
        $permissions = Permission::orderBy('title')->get()->pluck('title', 'id');

        return view('users.create', compact('role', 'permissions'));
    }
}
