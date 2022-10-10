<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Book $book)
    {
        if (!Auth::user()->can('create-update-books')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $genres = Genre::orderBy('title')->get()->pluck('title', 'id');

        $authors = Author::orderBy('full_name')->orderByDesc('created_at')->get()->pluck('full_name', 'id');

        $thisBookGenres = $book->genres->pluck('id')->all();

        return view('books.edit', compact('book', 'genres', 'authors', 'thisBookGenres'));
    }
}
