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
            ],
            [
                'name' => 'Harper Lee',
            ],
            [
                'name' => 'George Orwell',
            ],
            // Add more authors as needed
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
