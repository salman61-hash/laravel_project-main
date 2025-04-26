<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;

    protected $table = 'expense_type';

    protected $fillable = [
        'name', // Adjust based on your actual database columns

    ];

    public function profits()
    {
        return $this->hasMany(Profit::class, 'expense_type_id');
    }



}
