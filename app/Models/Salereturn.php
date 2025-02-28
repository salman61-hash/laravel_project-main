<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salereturn extends Model
{
    protected $table = 'sales_returns'; // Correct table name

    protected $fillable = [
        'customer_id',
        'refund_amount',
        'discount',
        'vat',
        'return_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
