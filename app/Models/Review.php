<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    // Quan hệ belongsTo với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ belongsTo với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}