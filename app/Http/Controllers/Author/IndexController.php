<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Author\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = Author::with('user', 'books')
            ->withCount('books')
            ->orderByDesc('created_at')
            ->get();

        $authorsCount = $authors->count();

        return view('authors.index', compact('authors', 'authorsCount'));
    }
}
