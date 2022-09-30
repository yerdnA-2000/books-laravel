<?php

namespace App\Http\Controllers\API\User;

use App\Http\Requests\API\User\StoreRequest;
use App\Http\Resources\User\UserResource;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = $this->service->store($data);

        return new UserResource($user);
    }
}
