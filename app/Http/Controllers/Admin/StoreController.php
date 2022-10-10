<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        if (!Auth::user()->can('create-update-admins')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $admin = User::create($data);

        $admin->roles()->attach($data['roles']);
        $admin->permissions()->sync($data['permissions']);

        return to_route('admins.show', $admin);
    }
}
