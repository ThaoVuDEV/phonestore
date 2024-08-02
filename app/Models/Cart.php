<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'variant_id',
        'quantity',
        'total_price',
        'price'
    ];

    // Quan hệ belongsTo với Cart


    // Quan hệ belongsTo với Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
