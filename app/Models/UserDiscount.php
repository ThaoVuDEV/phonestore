<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDiscount extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'discount_id',
        'used_at',
    ];

    // Quan hệ belongsTo với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ belongsTo với Discount
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
