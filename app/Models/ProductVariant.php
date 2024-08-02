<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'price',
        'stock',
        'product_id',
        'image',
        'color_id',
        'capacity_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function dealsOfTheWeek()
    {
        return $this->hasMany(DealOfTheWeek::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function capacity()
    {
        return $this->belongsTo(Capacity::class, 'capacity_id');
    }
}
