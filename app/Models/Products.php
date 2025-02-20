<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'products';

    protected $fillable = [
        'product_image',
        'product_name',
        'price',
        'stock',
        'description',
        'category'
    ];

    protected $dates = [
        'deleted_at',
    ];
}
