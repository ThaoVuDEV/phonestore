<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cart_id',
        'product_id',
        'variant_id',
        'quantity',
        'price',
    ];

    // Quan hệ belongsTo với Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Quan hệ belongsTo với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Quan hệ belongsTo với ProductVariant
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
