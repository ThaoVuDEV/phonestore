<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'status',
        'user_id',
    ];

    // Quan hệ belongsTo với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ hasMany với OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
