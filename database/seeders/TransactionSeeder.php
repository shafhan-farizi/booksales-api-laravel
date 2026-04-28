<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil data buku pertama
        $book1 = \App\Models\Book::find(1);
        if ($book1) {
            $qty = 2;
            Transaction::create([
                'order_number' => 'ORD-001',
                'customer_id' => 2,
                'book_id' => $book1->id,
                'quantity' => $qty,
                'total_amount' => $book1->price * $qty, // Otomatis hitung
            ]);
        }

        // 2. Ambil data buku kedua
        $book2 = \App\Models\Book::find(2);
        if ($book2) {
            $qty = 2;
            Transaction::create([
                'order_number' => 'ORD-002',
                'customer_id' => 2,
                'book_id' => $book2->id,
                'quantity' => $qty,
                'total_amount' => $book2->price * $qty, // Otomatis hitung
            ]);
        }
    }
}
