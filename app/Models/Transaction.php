<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_number',
        'quantity',
        'customer_id',
        'book_id',
        'total_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
