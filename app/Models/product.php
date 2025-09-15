<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     protected $fillable = [
        'name', 'unit', 'price', 'old_price', 'limit', 'category', 'image'
    ];
}
