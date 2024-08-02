<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'category_id', 'image'];


    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    
    public function colors()
    {
        return $this->hasManyThrough(Color::class, ProductVariant::class, 'product_id', 'id', 'id', 'color_id');
    }

    public function capacities()
    {
        return $this->hasManyThrough(Capacity::class, ProductVariant::class, 'product_id', 'id', 'id', 'capacity_id');
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
    public function featured()
    {
        return $this->hasOne(FeaturedProduct::class);
    }

    public function bestSelling()
    {
        return $this->hasOne(BestSellingProduct::class);
    }
    public function dealsOfTheWeek()
    {
        return $this->hasMany(DealOfTheWeek::class);
    }

    public function flashDeals()
    {
        return $this->hasMany(FlashDeal::class);
    }
    public function SpecialPrice()
    {
        return $this->hasMany(SpecialPrice::class);
    }
}
