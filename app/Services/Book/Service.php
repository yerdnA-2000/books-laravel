<?php

namespace App\Services\Book;

use App\Models\Book;

class Service
{
    public function create($data) : Book
    {
        $genres = $data['genres'];
        unset($data['genres']);

        $book = Book::create($data);

        $book->genres()->sync($genres);

        return $book;
    }

    public function update($data, Book $book) : Book
    {
        $genres = $data['genres'];
        unset($data['genres']);

        $book->update($data);

        $book->genres()->sync($genres);

        return $book;
    }

}
