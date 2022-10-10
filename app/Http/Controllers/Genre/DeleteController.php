<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke(Genre $genre)
    {
        if (!Auth::user()->can('delete-genres')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $genre->delete();

        return to_route('genres.index');
    }
}
