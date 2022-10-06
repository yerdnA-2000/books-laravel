<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $book = Book::find($id);

        if (Auth::id() != $book->author->user->id) {
            return response()->json(['message' => 'Нет доступа']);
        }

        Book::destroy($id);

        return response()->json(['message' => 'Книга успешно удалена']);
    }
}
