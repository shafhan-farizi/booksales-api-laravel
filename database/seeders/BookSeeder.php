<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Pulang',
                'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
                'price' => 40000,
                'stock' => 15,
                'cover_photo' => 'pulang.jpg',
                'genre_id' => 1,
                'author_id' => 1,
            ],
            [
                'title' => 'Laut Bercerita',
                'description' => 'Kisah perjuangan aktivis pada masa orde baru.',
                'price' => 95000,
                'stock' => 10,
                'cover_photo' => 'laut-bercerita.jpg',
                'genre_id' => 2,
                'author_id' => 2,
            ],
            [
                'title' => 'Bumi Manusia',
                'description' => 'Kisah cinta Minke dan Annelies di masa kolonial.',
                'price' => 120000,
                'stock' => 5,
                'cover_photo' => 'bumi-manusia.jpg',
                'genre_id' => 2,
                'author_id' => 3,
            ],
            [
                'title' => 'Filosofi Teras',
                'description' => 'Penerapan filosofi Stoikisme dalam kehidupan modern.',
                'price' => 85000,
                'stock' => 20,
                'cover_photo' => 'filosofi-teras.jpg',
                'genre_id' => 3,
                'author_id' => 4,
            ],
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Kisah perjuangan 10 anak Belitung mengejar mimpi.',
                'price' => 75000,
                'stock' => 12,
                'cover_photo' => 'laskar-pelangi.jpg',
                'genre_id' => 1,
                'author_id' => 5,
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
