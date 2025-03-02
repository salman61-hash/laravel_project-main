<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts'; // Ensure this matches your DB table name
    protected $fillable = ['name'];

    // An account has many payments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'account_id');
    }

}
