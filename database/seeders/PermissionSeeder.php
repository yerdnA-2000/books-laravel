<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $manageAccount = new Permission();
        $manageAccount->title = 'Управление аккаунтом';
        $manageAccount->slug = 'manage-account';
        $manageAccount->save();

        $createBooks = new Permission();
        $createBooks->title = 'Создание книг';
        $createBooks->slug = 'create-books';
        $createBooks->save();
    }
}
