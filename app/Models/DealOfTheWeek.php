<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealOfTheWeek extends Model
{
   
    use HasFactory;

    protected $fillable = ['product_variant_id', 'discount', 'start_date', 'end_date'];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
    
    public function listDeal($perPage = 5){
        return $this->with('variant')->paginate($perPage);
    }
}
