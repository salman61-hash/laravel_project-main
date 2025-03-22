<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchasemodel extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id'); // Adjust foreign key if needed
    }
    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id'); // Adjust foreign key if needed
    }
}
