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
        $authorBookData = [
            [
                'author_id' => 1,
                'book_id' => 1
            ],
            [
                'author_id' => 2,
                'book_id' => 1
            ],
            [
                'author_id' => 2,
                'book_id' => 2
            ],
            [
                'author_id' => 3,
                'book_id' => 3
            ],
            // Add more author-book relationships as needed
        ];

        foreach ($authorBookData as $data) {
            $author = Author::find($data['author_id']);
            $book = Book::find($data['book_id']);

            if ($author && $book) {
                $book->authors()->attach($author);
            }
        }
    }
}
