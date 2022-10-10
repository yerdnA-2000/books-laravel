<?php

namespace App\Models;

use App\Traits\Timestampable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory, Timestampable;

    public function books() {
        return $this->belongsToMany(Book::class, 'book_genre');
    }

    protected $fillable = [
        'title'
    ];

    protected $casts = [];
}
