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
                'title' => 'The Lord of the Rings',
                'description' => 'The Lord of the Rings is an epic fantasy novel by J.R.R. Tolkien. It follows the journey of Frodo Baggins and his companions as they seek to destroy the One Ring and defeat the Dark Lord Sauron.',
                'price' => 19.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'The Chronicles of Narnia',
                'description' => 'The Chronicles of Narnia is a series of fantasy novels by C.S. Lewis. It tells the adventures of children who find a magical wardrobe that leads them to the mystical world of Narnia.',
                'price' => 15.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'To Kill a Mockingbird is a novel by Harper Lee. It explores themes of racial injustice and the loss of innocence in the Deep South during the 1930s.',
                'price' => 12.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'The Alchemist',
                'description' => 'The Alchemist is a novel by Paulo Coelho. It follows the journey of a young shepherd named Santiago as he seeks his personal legend and learns valuable life lessons along the way.',
                'price' => 9.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'The Great Gatsby',
                'description' => 'The Great Gatsby is a novel written by F. Scott Fitzgerald. It is a story of the Jazz Age and the American Dream, set in the Roaring Twenties.',
                'price' => 10.99,
                'category_id' => $categories->random()->id
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'To Kill a Mockingbird is a novel by Harper Lee. It explores themes of racial injustice and the loss of innocence in the Deep South during the 1930s.',
                'price' => 12.99,
                'category_id' => $categories->random()->id
            ],

        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
