<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $books = Book::all();

        // create 10 author-book relationships
        for ($i = 0; $i < 10; $i++) {
            $author = $authors->random();
            $book = $books->random();

            // check if the author is already attached to the book
            if (!$book->authors->contains($author)) {
                $book->authors()->attach($author);
            }
        }
    }
}
