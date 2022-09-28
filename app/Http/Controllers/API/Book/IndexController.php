<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::all();
        return new BookResource($books);
    }
}
