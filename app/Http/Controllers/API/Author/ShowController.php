<?php

namespace App\Http\Controllers\API\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\Author\AuthorWithBooksResource;
use App\Models\Author;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $author = Author::with('books')->find($id);

        return response()->json(['authors' => new AuthorWithBooksResource($author)]);
    }
}
