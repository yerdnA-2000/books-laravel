<?php

namespace App\Services\API\Auth;

use App\Models\Author;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class Service
{
    public function create($data) : User
    {
        $role = Role::where('slug', 'author')->first();

        $author = new Author($data);

        $user = User::create($data);

        $user->roles()->sync($role->id);
        $user->author()->save($author);

        return $user;
    }

    public function update($data)
    {

    }
}
