<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases'; // The name of the table

    protected $fillable = [
        'supplier_id',
        'user_id',
        'purchase_date',
        'total_amount',
        'payment_status_id',
    ];

    // Define the relationship to Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    // Define the relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define the relationship to payment_status
    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class);
    }
    public function cupon()
    {
        return $this->belongsTo(cupon::class,'cupon_id');
    }
    // public function products()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
