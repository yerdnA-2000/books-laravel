<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Author $author)
    {
        if (!Auth::user()->can('create-update-authors')) {
            abort(403, 'НЕТ ПРАВ');
        }

        return view('authors.edit', compact('author'));
    }
}
