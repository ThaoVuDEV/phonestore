<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
    ];

    // Thiết lập quan hệ belongsTo với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Thiết lập quan hệ hasMany với CartItem
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // Tính tổng giá trị của giỏ hàng
    public function getTotalPriceAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    }
}
