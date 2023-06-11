<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Console\Command;

class InsertBookData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert-book-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $books = [
            [
                'title' => 'The Lord of the Rings',
                'category' => 'Fantasy',
                'price' => 19.99,
                'authors' => [
                    [
                        'name' => 'J.R.R. Tolkien',
                        'email' => 'tolkeinexample.com'
                    ]
                ],
                'description' => 'The Lord of the Rings is an epic fantasy novel by J.R.R. Tolkien. It follows the journey of Frodo Baggins and his companions as they seek to destroy the One Ring and defeat the Dark Lord Sauron.',
            ],
            [
                'title' => 'The Chronicles of Narnia',
                'category' => 'Fantasy',
                'price' => 15.99,
                'authors' => [
                    [
                        'name' => 'C.S. Lewis',
                        'email' => 'lewis@example.com'
                    ]
                ],
                'description' => 'The Chronicles of Narnia is a series of fantasy novels by C.S. Lewis. It tells the adventures of children who find a magical wardrobe that leads them to the mystical world of Narnia.',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'category' => 'Novel',
                'price' => 12.99,
                'authors' => [
                    [
                        'name' => 'Harper Lee',
                        'email' => 'harper@example.com'
                    ]
                ],
                'description' => 'To Kill a Mockingbird is a novel by Harper Lee. It explores themes of racial injustice and the loss of innocence in the Deep South during the 1930s.',
            ],
            [
                'title' => 'The Alchemist',
                'category' => 'Fiction',
                'price' => 9.99,
                'authors' => [
                    [
                        'name' => 'Paulo Coelho',
                        'email' => 'paulo@example.com'
                    ]
                ],
                'description' => 'The Alchemist is a novel by Paulo Coelho. It follows the journey of a young shepherd named Santiago as he seeks his personal legend and learns valuable life lessons along the way.',
            ],
        ];

        foreach ($books as $book) {
            $authors = $book['authors'];
            unset($book['authors']);

            $category = $book['category'];
            unset($book['category']);

            // firstOrCreate category
            $category = Category::firstOrCreate(['name' => $category]);

            // create book
            $book = Book::updateOrCreate([
                'title' => $book['title'],
            ], array_merge($book, ['category_id' => $category->id]));

            // first or create authors and attach
            foreach ($authors as $author) {
                $author = Author::firstOrCreate([
                    'email' => $author['email']
                ],['name' => $author['name']]);
                $book->authors()->sync($author->id);
            }
        }

        $this->info('Book data inserted successfully.');
    }
}
