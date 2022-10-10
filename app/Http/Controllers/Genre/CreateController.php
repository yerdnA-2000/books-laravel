<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        if (!Auth::user()->can('create-update-genres')) {
            abort(403, 'НЕТ ПРАВ');
        }

        return view('genres.create');
    }
}
