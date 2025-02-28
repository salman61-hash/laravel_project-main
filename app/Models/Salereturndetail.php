<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salereturndetail extends Model
{
    protected $table = 'sales_return_details'; // Explicitly set table name

    protected $fillable = [
        'salereturn_id',
        'product_id',
        'description',
        'quantity',
        'price',
        'discount',
        'vat'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
