<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'stock';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = ['product_id', 'quantity','min_stock_leve','updated_at'];

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}
