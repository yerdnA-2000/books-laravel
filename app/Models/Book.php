<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    protected $fillable = [
        'title',
    ];

    public function getCreatedAtAttribute() {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d.m.Y H:i');
    }
}
