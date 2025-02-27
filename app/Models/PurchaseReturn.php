<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
