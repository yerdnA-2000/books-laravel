<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Вы уже авторизованы']);
        }

        $data = $request->validated();

        $user = $this->service->create($data);

        if ($user) {
            $user->createNewApiToken();

            Auth::login($user);

            return response()->json(['message' => 'Вы успешно зарегистрировались', 'user' => new UserResource($user)]);
        }

        return response()->json(['message' => 'Ошибка регистрации!']);
    }
}
