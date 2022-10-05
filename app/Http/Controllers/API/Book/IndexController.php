<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::with('author')->orderBy('title')->get();

        return response()->json(['books' => new BookCollection($books)], 200);
    }
}
