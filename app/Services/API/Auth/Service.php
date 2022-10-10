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
        $createBooks = Permission::where('slug', 'create-books')->first();

        $user = User::create($data);

        $user->roles()->attach($role);
        $user->permissions()->attach($createBooks);
        $user->author()->save(new Author(['full_name' => 'null']));

        return $user;
    }

    public function update($data)
    {

    }
}
