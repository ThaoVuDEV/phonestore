<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'quantity',
        'price',
        'subtotal',
    ];

    // Quan hệ belongsTo với Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ belongsTo với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Quan hệ belongsTo với ProductVariant
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
