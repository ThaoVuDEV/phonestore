<?php

namespace App\Models;

use DateTime;
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
    public function applyCouponed($id) {
        $coupon = $this->find($id);
        if ($coupon && $this->isValid($coupon)) {
            $coupon->used_count += 1;
            $coupon->save();     
        } else {
          
        }
    }
    
    public function isValid($coupon) {
        // Kiểm tra nếu mã giảm giá chưa hết hạn và chưa vượt quá giới hạn sử dụng
        $currentDate = new DateTime();
        if ($coupon->end_date >= $currentDate && $coupon->usage_limit > $coupon->used_count) {
            return true;
        }
        return false;
    }
}
