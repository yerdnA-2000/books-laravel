<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {

        $admin = User::with('permissions')->find(Auth::id());
        $permissions = Permission::orderBy('title')->get()->pluck('title', 'id');
        $thisAdminPermissions = $admin->permissions->pluck('id')->all();

        return view('dashboard', compact('permissions', 'admin', 'thisAdminPermissions'));
    }
}
