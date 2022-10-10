<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\StoreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        if (!Auth::user()->can('create-update-genres')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $genre = Genre::create($data);

        return to_route('genres.show', $genre);
    }
}
