<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke(Author $author)
    {
        if (!Auth::user()->can('delete-authors')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $user = $author->user();

        $author->delete();

        $user->delete();

        return to_route('authors.index');
    }
}
