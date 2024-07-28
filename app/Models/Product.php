<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

   
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getTotalValue()
    {
        return $this->price * $this->stock;
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
