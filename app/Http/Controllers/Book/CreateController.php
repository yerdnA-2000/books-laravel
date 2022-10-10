<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        if (!Auth::user()->can('create-update-books')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $genres = Genre::orderBy('title')->get();
        $authors = Author::orderBy('full_name')->orderByDesc('created_at')->get();

        return view('books.create', compact('authors', 'genres'));
    }
}
