<?php

namespace App\Http\Controllers\API\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Author\UpdateRequest;
use App\Http\Resources\Author\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Вы не авторизованы']);
        }

        $author = Author::find($id);

        if ($author->user->id == Auth::id()) {

            $data = $request->validated();

            $author->update($data);

            return response()->json(['message' => 'Данные успешно изменены', 'author' => new AuthorResource($author)]);
        }

        return response()->json(['message' => 'Нет доступа']);
    }
}

