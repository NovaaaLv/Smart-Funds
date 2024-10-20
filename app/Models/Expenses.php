<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'amount',
        'price',
        'total',
        'date'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
