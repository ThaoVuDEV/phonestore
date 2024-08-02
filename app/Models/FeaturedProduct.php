<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
    public function addFeaturedPro($data)
    {
        // Kiểm tra xem sản phẩm đã tồn tại trong danh sách đặc sắc hay chưa
        $existingFeatured = $this->where('product_id', $data['product_id'])->first();

        if ($existingFeatured) {
            return false;
        }

        // Nếu không tồn tại, thêm sản phẩm vào danh sách đặc sắc
        return $this->create($data);
    }
    public function listFeatured($perPage = 8){
        return $this->with('product')->paginate($perPage);
    }
}
