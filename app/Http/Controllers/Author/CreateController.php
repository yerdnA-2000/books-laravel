<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        if (!Auth::user()->can('create-update-authors')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $role = Role::where('slug', 'author')->first();

        return view('authors.create', compact('role'));
    }
}
