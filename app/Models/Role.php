<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasRolesAndPermissions;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
