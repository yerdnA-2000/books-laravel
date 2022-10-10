<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke(Book $book)
    {
        if (!Auth::user()->can('delete-books')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $book->delete();

        return to_route('books.index');
    }
}
