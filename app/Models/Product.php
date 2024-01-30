<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_image',
        'product_slug',
        'product_new',
        'product_featured',
        'status',
        'description',
        'price',
        'special_price',
        'quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
