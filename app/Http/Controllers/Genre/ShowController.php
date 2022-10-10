<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }
}
