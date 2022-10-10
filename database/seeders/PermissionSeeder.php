<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        //---Books
        $perm = new Permission();
        $perm->title = 'Создание/Изменение книг';
        $perm->slug = 'create-update-books';
        $perm->save();

        $perm = new Permission();
        $perm->title = 'Удаление книг';
        $perm->slug = 'delete-books';
        $perm->save();

        //---Genres
        $perm = new Permission();
        $perm->title = 'Создание/Изменение жанров';
        $perm->slug = 'create-update-genres';
        $perm->save();

        $perm = new Permission();
        $perm->title = 'Удаление жанров';
        $perm->slug = 'delete-genres';
        $perm->save();

        //---Authors
        $perm = new Permission();
        $perm->title = 'Создание/Изменение авторов';
        $perm->slug = 'create-update-authors';
        $perm->save();

        $perm = new Permission();
        $perm->title = 'Удаление авторов';
        $perm->slug = 'delete-authors';
        $perm->save();

        //---Admins
        $perm = new Permission();
        $perm->title = 'Создание/Изменение администраторов';
        $perm->slug = 'create-update-admins';
        $perm->save();

        $perm = new Permission();
        $perm->title = 'Удаление администраторов';
        $perm->slug = 'delete-admins';
        $perm->save();
    }
}
