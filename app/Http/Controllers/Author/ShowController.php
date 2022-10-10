<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Author $author)
    {
        $author->loadCount('books');

        return view('authors.show', compact('author'));
    }
}
