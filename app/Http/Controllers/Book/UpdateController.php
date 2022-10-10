<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Book $book)
    {
        if (!Auth::user()->can('create-update-books')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $book = $this->service->update($data, $book);

        return to_route('books.show', $book);
    }
}
