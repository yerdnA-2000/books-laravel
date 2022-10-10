<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Models\User;

class Service
{
    public function create($data) : User
    {
        $roles = $data['roles'];

        $author = new Author($data);

        $user = User::create($data);
        $user->clearApiToken();

        $user->roles()->sync($roles);
        $user->author()->save($author);

        return $user;
    }

}
