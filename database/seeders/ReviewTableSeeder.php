<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 reviews for books
        Book::all()->each(function (Book $book) {
            Review::factory()->count(10)->create([
                'book_id' => $book->id,
            ]);
        });
    }
}
