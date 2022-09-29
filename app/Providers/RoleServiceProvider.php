<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //Прошел ли Пользователь аутентификацию и имеет ли он заданную роль
        Blade::directive('role', function ($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });
        Blade::directive('endrole', function ($role){
            return "<?php endif; ?>";
        });
    }

    /*
     * @role('admin')
     *      Admin Panel
     * @endrole
     * */
}
