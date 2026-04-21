<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            ['name' => 'Tere Liye', 'city' => 'Jakarta'],
            ['name' => 'Leila S. Chudori', 'city' => 'Jakarta'],
            ['name' => 'Pramoedya Ananta Toer', 'city' => 'Blora'],
            ['name' => 'Henry Manampiring', 'city' => 'Jakarta'],
            ['name' => 'Andrea Hirata', 'city' => 'Belitung'],
        ];

        foreach($authors as $author) {
            Author::create($author);
        }
    }
}
