<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $fillable = ['name'];  // Assuming 'name' is a column in the 'payment_status' table
}
