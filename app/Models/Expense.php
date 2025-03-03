<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // Define the table name if different from the default
    protected $table = 'expenses';

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'expense_type_id',
        'amount',
        'expense_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }

}
