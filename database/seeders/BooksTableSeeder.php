<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::select('id')->get();

        $books = [
            [
                'title' => 'The Great Gatsby',
                'description' => 'A novel by F. Scott Fitzgerald',
                'price' => 12.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'A novel by Harper Lee',
                'price' => 10.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => '1984',
                'description' => 'A dystopian novel by George Orwell',
                'price' => 9.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'Pride and Prejudice',
                'description' => 'A novel by Jane Austen',
                'price' => 8.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'The Hobbit',
                'description' => 'A fantasy novel by J.R.R. Tolkien',
                'price' => 14.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'description' => 'A fantasy novel by J.K. Rowling',
                'price' => 11.99,
                'category_id' => $categories->random()->id
            ],

        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
