<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchasereturndetail extends Model
{


    protected $table = 'purchase_return_details'; // Explicitly set table name

    protected $fillable = [
        'purchasereturn_id',
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
