<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(User $admin)
    {
        if (!Auth::user()->can('create-update-admins')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $is_my_user = Auth::id() == $admin->id;

        $role = Role::where('slug', 'admin')->first();
        $permissions = Permission::orderBy('title')->get()->pluck('title', 'id');
        $thisAdminPermissions = $admin->permissions->pluck('id')->all();

        return view('users.edit',
            compact('role', 'permissions', 'admin', 'thisAdminPermissions', 'is_my_user'));
    }
}
