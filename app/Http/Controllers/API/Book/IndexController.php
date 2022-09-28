<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::all();
        return new BookCollection($books);
    }
}
