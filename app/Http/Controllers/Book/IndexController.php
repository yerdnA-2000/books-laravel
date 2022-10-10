<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Models\Book;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::with('author')->orderByDesc('created_at')->get();

        $booksCount = $books->count();

        return view('books.index', compact('books', 'booksCount'));
    }
}
