<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $admin = new Role();
        $admin->title = 'Админ';
        $admin->slug = 'admin';
        $admin->save();

        $author = new Role();
        $author->title = 'Автор';
        $author->slug = 'author';
        $author->save();
    }
}
