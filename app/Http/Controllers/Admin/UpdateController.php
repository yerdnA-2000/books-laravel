<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $admin)
    {
        if (!Auth::user()->can('create-update-admins')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $admin->update($data);

        $admin->permissions()->sync($data['permissions']);

        return to_route('admins.show', $admin);
    }
}
