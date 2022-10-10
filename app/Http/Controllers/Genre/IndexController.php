<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $genres = Genre::with('books')->orderBy('title')->get();

        $genresCount = $genres->count();

        return view('genres.index', compact('genres', 'genresCount'));
    }
}
