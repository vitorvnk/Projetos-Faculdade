<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Book::create([
            'title' => 'Fora de Circuito',
            'img' => '16444263936203f4996bc0d.png',
            'description' => 'Um Livro',
            'author_id' => '1',
            'categorie_id' => '1'
        ]);
    }
}
