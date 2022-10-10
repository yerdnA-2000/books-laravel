<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\UpdateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Genre $genre)
    {
        if (!Auth::user()->can('create-update-genres')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        unset($data['id']);

        $genre->update($data);

        return to_route('genres.show', $genre);
    }
}
