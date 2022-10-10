<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreRequest;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        if (!Auth::user()->can('create-update-authors')) {
            abort(403, 'НЕТ ПРАВ');
        }

        $data = $request->validated();

        $user = $this->service->create($data);

        $user->with('author');

        return to_route('authors.show', $user->author);
    }
}
