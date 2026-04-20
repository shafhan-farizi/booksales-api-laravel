<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        ['id' => 1, 'name' => 'Tere Liye', 'city' => 'Jakarta'],
        ['id' => 2, 'name' => 'Leila S. Chudori', 'city' => 'Jakarta'],
        ['id' => 3, 'name' => 'Pramoedya Ananta Toer', 'city' => 'Blora'],
        ['id' => 4, 'name' => 'Henry Manampiring', 'city' => 'Jakarta'],
        ['id' => 5, 'name' => 'Andrea Hirata', 'city' => 'Belitung'],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}
