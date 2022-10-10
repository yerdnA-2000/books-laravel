<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Genre $genre)
    {
        if (!Auth::user()->can('create-update-genres')) {
            abort(403, 'НЕТ ПРАВ');
        }

        return view('genres.edit', compact('genre'));
    }
}
