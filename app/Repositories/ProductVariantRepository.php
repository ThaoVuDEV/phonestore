<?php

namespace App\Repositories;

use App\Models\ProductVariant;

class ProductVariantRepository
{
    protected $productVariant;

    public function __construct(ProductVariant $productVariant)
    {
        $this->productVariant = $productVariant;
    }
    public function all()
    {
        return $this->productVariant
            ->with(['product' => function ($query) {
                $query->select('id', 'name'); // Chọn các trường cần thiết từ bảng products
            }])
            ->whereNull('deleted_at')
            ->get(); // Thực thi truy vấn và lấy kết quả
    }


    public function create($data)
    {
        return $this->productVariant->create($data);
    }

    public function update(ProductVariant $productVariant, $data)
    {
        return $productVariant->update($data);
    }

    public function delete(ProductVariant $productVariant)
    {
        return $productVariant->delete();
    }

    public function find($id)
    {
        return $this->productVariant->whereNull('deleted_at')->find($id);
    }

    public function paginate($perPage = 5, $columns = ['*'])
    {
        return $this->productVariant->join('categories', function ($join) {
            $join->on('products.category_id', '=', 'categories.id')
                ->whereNull('categories.deleted_at');
        })
            ->whereNull('products.deleted_at')
            ->select('products.*', 'categories.name as cate_name')
            ->paginate($perPage, $columns);
    }

    public function onlyTrashed()
    {
        return $this->productVariant->onlyTrashed()->paginate(5);
    }

    public function restore($id)
    {
        $productVariant = $this->productVariant->onlyTrashed()->find($id);
        if ($productVariant) {
            $productVariant->restore();
            return $productVariant;
        }
        return null;
    }
    public function getProductVariantById($id)
    {
        return $this->productVariant->find($id);
    }
    // ProductVariantRepository.php
    public function deleteByProductId($productId)
    {
        return $this->productVariant->where('product_id', $productId)->delete();
    }
    // Phương thức mới để tìm biến thể dựa trên thuộc tính
    public function findByAttributes($productId, $capacityId, $colorId)
    {
        return $this->productVariant
            ->where('product_id', $productId)
            ->where('capacity_id', $capacityId)
            ->where('color_id', $colorId)
            ->first();
    }
}
