<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class books extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = [
            [
                'title' => 'Buku 1',
                'author' => 'Author 1',
                'id_category' => 1,
                'publisher' => 'Publisher 1',
                'isbn' => '9794107026070',
                'cover' => 'cover1.jpg',
                'description' => 'Description 1',
                'published_date' => '2020-01-01',
            ],
            [
                'title' => 'Buku 2',
                'author' => 'Author 2',
                'id_category' => 1,
                'publisher' => 'Publisher 2',
                'isbn' => '9782780604456',
                'cover' => 'cover2.jpg',
                'description' => 'Description 2',
                'published_date' => '2020-01-01',
            ],
        ];
        \App\Models\BooksModel::insert($save);
    }
}
