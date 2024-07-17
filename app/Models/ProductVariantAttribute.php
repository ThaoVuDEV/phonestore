<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantAttribute extends Model
{
   
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'attribute_value',
        'variant_id',
        'attribute_id',
    ];

    // Quan hệ belongsTo với ProductVariant
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    // Quan hệ belongsTo với ProductAttribute
    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
