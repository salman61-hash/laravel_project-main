<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'transaction_type', 'debit', 'credit', 'amount_paid', 'payment_date'];

    // Each payment belongs to one account
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
