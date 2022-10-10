<?php

namespace App\Models;

use App\Traits\Timestampable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory, Timestampable;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }

    protected $fillable = [
        'full_name'
    ];

    protected $casts = [

    ];
}
