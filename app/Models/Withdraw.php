<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $table = 'withdraw'; // Table name (optional if it follows Laravel naming conventions)

    protected $fillable = [
        'user_id',
        'withdraw_type_id',
        'product_id',
        'quantity',
        'amount',
        'withdraw_date',
    ];
}
