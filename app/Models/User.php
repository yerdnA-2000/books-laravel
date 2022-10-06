<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function author() {
        return $this->hasOne(Author::class);
    }

    public function createNewApiToken() {
        $this->update(['api_token' => Str::random(80)]);
    }

    public function clearApiToken() {
        $this->update(['api_token' => null]);
    }

    protected $fillable = [
        'email',
        'password',
        'api_token',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [

    ];
}
