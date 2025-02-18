<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    // Specify the table name (optional if table name is plural of model)
    protected $table = 'sales_details';

    // Define the fillable columns (you may adjust this to include only the columns you want to mass-assign)
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Define the relationships

    /**
     * Get the product associated with the sales detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    /**
     * Get the sale associated with the sales detail.
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class); // Assuming you have a Sale model
    }
    public function cupon()
    {
        return $this->belongsTo(Cupon::class,'cupon_id'); // Assuming you have a Sale model
    }

    // Additional methods can be added if needed, for example to calculate totals
    public function totalAmount()
    {
        return $this->quantity * $this->price;
    }
}
