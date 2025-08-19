<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Library;

class DatabaseSeeder extends Seeder
{


    public function run(): void
    {

        $library = Library::factory()->create();


        $authors = Author::factory(3)->create();

        Book::factory(50)->create()->each(function($book) use ($authors, $library) {
            $book->author_id = $authors->random()->id;
            $book->library_id = $library->id;
            $book->save();
        });
    }
}
