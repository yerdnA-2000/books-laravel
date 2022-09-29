<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /*проверяем в цикле, содержат ли роли текущего пользователя заданную роль*/
    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /*Проверка - содержат ли права пользователя заданное право*/
    public function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission)->count();
    }

    /*функция проверяет, привязана ли Роль с Правами к Пользователю*/
    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role) {
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    /*Метод, который будет проверять, есть ли у Пользователя Права напрямую или через Роль*/
    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission->slug);
    }

    /*---Выдача прав---*/
    /*Получаем все Права на основе переданного массива*/
    public function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug',$permissions)->get();
    }

    /*Передаем Права в виде массива и получаем все Права из базы данных на основе массива*/
    public function givePermissionsTo(... $permissions) {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    /*---Удаление прав---*/
    /*Удаляем все прикрепленные Права*/
    public function deletePermissions(... $permissions ) {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /*Фактически удаляем все Права Пользователя, а затем переназначаем предоставленные для него Права*/
    public function refreshPermissions(... $permissions ) {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
