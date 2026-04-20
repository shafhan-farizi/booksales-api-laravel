<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $genres = [
        ['id' => 1, 'name' => 'Fiksi'],
        ['id' => 2, 'name' => 'Sejarah'],
        ['id' => 3, 'name' => 'Filosofi'],
        ['id' => 4, 'name' => 'Sains'],
        ['id' => 5, 'name' => 'Biografi'],
    ];

    public function getGenres() {
        return $this->genres;
    }
}
