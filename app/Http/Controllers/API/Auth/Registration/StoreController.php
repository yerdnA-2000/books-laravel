<?php

namespace App\Http\Controllers\API\Auth\Registration;

use App\Http\Controllers\API\Auth\BaseController;
use App\Http\Requests\API\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'Вы уже авторизованы', 'status' => 200]);
        }

        $data = $request->validated();

        $user = $this->service->create($data);

        if ($user) {
            Auth::login($user);
            return response()->json(['message' => 'Вы успешно зарегистрировались', 'user' => new UserResource($user)]);
        }

        return response()->json(['message' => 'Ошибка регистрации!']);
    }
}
