<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'product_image',
        'category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
