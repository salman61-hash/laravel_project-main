<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model


{

    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'customer_id',  // Add customer_id to the fillable array
        'user_id',
        'sale_date',
        'total_amount',
        'payment_status_id',
    ];
    protected $table = 'sales';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, if you have a payment status, define the relationship:
   // In Sale model
   public function payment_status()
   {
       return $this->belongsTo(PaymentStatus::class,'payment_status_id');
   }

}
