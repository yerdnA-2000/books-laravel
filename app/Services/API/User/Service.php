<?php

namespace App\Services\API\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function store($data) : User
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $user;
    }

    public function update($data)
    {

    }
}
