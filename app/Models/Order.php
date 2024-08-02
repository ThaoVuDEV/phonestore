<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Các hằng số cho trạng thái đơn hàng
    const STATUS_PENDING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_SHIPPED = 3;
    const STATUS_COMPLETED = 4;
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'status',
        'user_id',
        'payment_method'
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
    public function setStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

   
}
