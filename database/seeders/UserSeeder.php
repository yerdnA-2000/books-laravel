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

        $createUpdateAdmins = Permission::where('slug','create-update-admins')->first();
        $createUpdateGenres = Permission::where('slug','create-update-genres')->first();
        $createUpdateBooks = Permission::where('slug','create-update-books')->first();
        $createUpdateAuthors = Permission::where('slug','create-update-authors')->first();
        $deleteAdmins = Permission::where('slug','delete-admins')->first();
        $deleteGenres = Permission::where('slug','delete-genres')->first();
        $deleteBooks = Permission::where('slug','delete-books')->first();
        $deleteAuthors = Permission::where('slug','delete-authors')->first();

        $user1 = new User();
        $user1->email = 'admin@test.com';
        $user1->password = 'admin';
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($createUpdateAdmins);
        $user1->permissions()->attach($createUpdateGenres);
        $user1->permissions()->attach($createUpdateBooks);
        $user1->permissions()->attach($createUpdateAuthors);
        $user1->permissions()->attach($deleteAdmins);
        $user1->permissions()->attach($deleteGenres);
        $user1->permissions()->attach($deleteBooks);
        $user1->permissions()->attach($deleteAuthors);

        $user2 = new User();
        $user2->email = 'vasya@test.com';
        $user2->password = 'vasya';
        $user2->save();
        $user2->author()->save(new Author(['full_name' => 'Васильев Василий Васильевич']));
        $user2->roles()->attach($author);

        $user3 = new User();
        $user3->email = 'maxim@test.com';
        $user3->password = 'maxim';
        $user3->save();
        $user3->author()->save(new Author(['full_name' => 'Максимов Максим Максимович']));
        $user3->roles()->attach($author);

        $user4 = new User();
        $user4->email = 'admin2@test.com';
        $user4->password = 'admin2';
        $user4->save();
        $user4->roles()->attach($admin);
        $user4->permissions()->attach($createUpdateGenres);
        $user4->permissions()->attach($createUpdateBooks);
        $user4->permissions()->attach($createUpdateAuthors);
        $user4->permissions()->attach($deleteGenres);
        $user4->permissions()->attach($deleteBooks);
        $user4->permissions()->attach($deleteAuthors);
    }
}
