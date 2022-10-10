<?php

namespace App\Models;

use App\Traits\Timestampable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Timestampable;

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    protected $fillable = [
        'title',
        'author_id',
    ];
}
