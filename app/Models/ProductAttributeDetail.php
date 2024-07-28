<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_attribute_id', // Khoá ngoại đến ProductAttribute
        'value', // Giá trị chi tiết của thuộc tính
    ];

    // Quan hệ belongsTo với ProductAttribute
    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class,'product_attribute_id');
    }
    
    
  
}