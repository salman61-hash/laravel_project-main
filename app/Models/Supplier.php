<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',  // Add this line
        'contact_person',  // Add this line
        'email',
        'phone',
        'address',
        // Add all other fields you want to allow for mass assignment
    ];
}
