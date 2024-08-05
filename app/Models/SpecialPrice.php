<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'special_price',
        'start_date',
        'end_date',
    ];
    // Khai báo kiểu dữ liệu cho các trường ngày
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Quan hệ belongsTo với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAll()
    {
        return $this->with('product')->paginate(8);
    }
    public function getProByID($id){
        $specialPrice = SpecialPrice::where('product_id',$id)->get();
        return $specialPrice;
    }
}
