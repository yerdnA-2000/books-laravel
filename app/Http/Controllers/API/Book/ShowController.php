<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $book = Book::find($id);

        return response()->json(new BookResource($book));
    }
}
