<?php

namespace App\Http\Controllers\Book;

use App\DTO\BookForm;
use App\Http\Requests\Book\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        if (!Auth::user()->can('create-update-books')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = BookForm::fromRequest($request);
        //$data = $request->validated();

        $book = $this->service->create($data);

        return to_route('books.show', $book);
    }
}
