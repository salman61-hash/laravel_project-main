<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salereturndetail extends Model
{

    protected $table="sales_returns_details";

    
    protected $fillable = [
        'salereturn_id', 'product_id', 'description', 'quantity',
        'price', 'discount', 'total_discount', 'vat', 'subtotal'
    ];
}
