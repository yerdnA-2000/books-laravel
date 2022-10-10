<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Author $author)
    {
        if (!Auth::user()->can('create-update-authors')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $author->update($data);

        return to_route('authors.show', $author->id);
    }
}
