<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'status',
    ];
}
