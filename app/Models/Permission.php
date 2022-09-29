<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasRolesAndPermissions;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
