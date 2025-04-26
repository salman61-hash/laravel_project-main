<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;

    protected $table = 'profit';


    protected $fillable = [
        'id',
        'name',
        'remarks',
        'amount',

        // add other column names as needed
    ];

    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }

}
