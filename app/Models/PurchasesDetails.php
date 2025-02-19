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
<<<<<<< HEAD
        return $this->belongsTo(Product::class, 'product_id');
=======
        return $this->belongsTo(Product::class);
>>>>>>> cbd6008b1b1762cbb387cdd5e12aeb3aae33cda1
    }
}
