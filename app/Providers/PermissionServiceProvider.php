<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //Сопоставляем все Права, определяем slug Права и проверяем, есть ли у Пользователя Право
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    /*
     * ---Проверка Права Пользователя
     *
     * вернёт true для текущего пользователя, если ему дано право создавать книги
     * Gate::allows('create-books');
     */
}
