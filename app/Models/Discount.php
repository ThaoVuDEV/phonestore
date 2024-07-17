<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'value',
        'start_date',
        'end_date',
        'usage_limit',
        'used_count',
    ];

    // Define enum for discount_type
    protected $enumDiscountType = ['fixed_amount', 'percentage'];

    // Quan hệ hasMany với UserDiscount
    public function userDiscounts()
    {
        return $this->hasMany(UserDiscount::class);
    }
}
