<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Русский детектив', 'Приключения', 'Русское фэнтези', 'Русский роман', 'Зарубежная классика',
            'Классическая проза', 'Русская литература для детей', 'Зарубежное фэнтези', 'Зарубежная фантастика',
            'Книги о войне', 'Научная фантастика'];

        foreach ($genres as $item) {
            $genre = new Genre();
            $genre->title = $item;
            $genre->save();
        }
    }
}
