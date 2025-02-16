<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasesDetails extends Model
{

    protected $table = 'purchase_details';

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
