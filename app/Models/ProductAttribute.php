<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    // Quan hệ hasMany với ProductVariantAttribute
    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }
     // Quan hệ hasMany với ProductAttributeDetail
    
     public function productAttributeDetails()
    {
        return $this->hasMany(ProductAttributeDetail::class, 'product_attribute_id');
    }
    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}