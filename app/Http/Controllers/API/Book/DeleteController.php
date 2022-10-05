<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        Book::destroy($id);

        return response()->json(['message' => 'Книга успешно удалена']);
    }
}
