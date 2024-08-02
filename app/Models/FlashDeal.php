<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    use HasFactory;

    protected $table = 'flash_deals';

    protected $fillable = ['product_id', 'discount', 'start_time', 'end_time'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
