<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Book\UpdateRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $book = Book::find($id);

        if (Auth::id() != $book->author->user->id) {
            return response()->json(['message' => 'Нет доступа']);
        }

        $book->update($data);

        return response()->json([
            'message' => 'Данные книги успешно изменены',
            'book' => new BookResource($book),
        ]);
    }
}
