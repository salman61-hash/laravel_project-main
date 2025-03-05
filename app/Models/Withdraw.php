<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $table = 'withdraw';
    protected $fillable = ['user_id', 'withdraw_type_id', 'product_id', 'quantity', 'amount', 'withdraw_date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Adjust foreign key if needed
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Adjust foreign key if needed
    }

    public function withdrawtype()
    {
        return $this->belongsTo(WithdrawType::class, 'withdraw_type_id'); // Adjust foreign key if needed
    }
}
