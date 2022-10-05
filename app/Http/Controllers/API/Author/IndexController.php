<?php

namespace App\Http\Controllers\API\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\Author\AuthorCollection;
use App\Models\Author;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = Author::with('books')->orderBy('full_name')->get();

        return response()->json(['authors' => new AuthorCollection($authors)]);
    }
}
