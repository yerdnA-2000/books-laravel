<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $author = Role::where('slug','author')->first();
        $admin = Role::where('slug', 'admin')->first();
        $createBooks = Permission::where('slug','create-books')->first();
        $manageAccount = Permission::where('slug','manage-account')->first();

        $user1 = new User();
        $user1->email = 'vasya@test.com';
        $user1->password = 'vasya';
        $user1->save();
        $user1->author()->save(new Author(['full_name' => 'Васильев Василий Васильевич']));
        $user1->roles()->attach($author);
        $user1->permissions()->attach($createBooks);

        $user2 = new User();
        $user2->email = 'admin@test.com';
        $user2->password = 'admin';
        $user2->save();
        $user2->roles()->attach($admin);
        $user2->permissions()->attach($manageAccount);

        $user1 = new User();
        $user1->email = 'maxim@test.com';
        $user1->password = 'maxim';
        $user1->save();
        $user1->author()->save(new Author(['full_name' => 'Максимов Максим Максимович']));
        $user1->roles()->attach($author);
        $user1->permissions()->attach($createBooks);
    }
}
