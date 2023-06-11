<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'F. Scott Fitzgerald',
                'email' => 'scott@example.com'
            ],
            [
                'name' => 'Harper Lee',
                'email' => 'harper@example.com'
            ],
            [
                'name' => 'George Orwell',
                'email' => 'george@example.com'
            ],
            [
                'name' => 'J.K. Rowling',
                'email' => 'rowling@example.com'
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
