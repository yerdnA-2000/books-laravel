<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = new Book();
        $book1->title = 'Загадочная история Ивана Васильевича';
        $book1->author_id = 1;
        $book1->save();
        $book1->genres()->sync([1, 2]);

        $book2 = new Book();
        $book2->title = 'Человек без лица';
        $book2->author_id = 1;
        $book2->save();
        $book2->genres()->sync([3, 4]);

        $book3 = new Book();
        $book3->title = 'Любовь и вороны';
        $book3->author_id = 2;
        $book3->save();
        $book3->genres()->sync([4]);

        $book4 = new Book();
        $book4->title = 'Спати рядового Петрова';
        $book4->author_id = 2;
        $book4->save();
        $book4->genres()->sync([10]);

        $book5 = new Book();
        $book5->title = 'Два полковника';
        $book5->author_id = 2;
        $book5->save();
        $book5->genres()->sync([10]);
    }
}
