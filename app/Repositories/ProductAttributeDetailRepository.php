<?php

namespace App\Repositories;

use App\Models\ProductAttributeDetail;
use Illuminate\Support\Facades\DB;

class ProductAttributeDetailRepository implements ProductAttributeDetailRepositoryInterface
{
    protected $attributesDetail;

    public function __construct(ProductAttributeDetail $attributesDetail)
    {
        $this->attributesDetail = $attributesDetail;
    }

    public function all()
    {
        return $this->attributesDetail->whereNull('deleted_at')->get();
    }

    public function create($data)
    {
        return $this->attributesDetail->create($data);
    }

    public function update(ProductAttributeDetail $attributesDetail, $data)
    {
        $attributesDetail->fill($data); // Điền dữ liệu vào đối tượng
        return $attributesDetail->save(); // Lưu lại đối tượng
    }

    public function delete(ProductAttributeDetail $attributesDetail)
    {
        return $attributesDetail->delete();
    }

    public function findByForeignKey($foreignKeyValue)
    {
        return ProductAttributeDetail::where('product_attribute_id', $foreignKeyValue)
            ->whereNull('product_attribute_details.deleted_at')
            ->join('product_attributes', function ($join) {
                $join->on('product_attribute_details.product_attribute_id', '=', 'product_attributes.id')
                    ->whereNull('product_attributes.deleted_at');
            })
            ->select('product_attribute_details.*', 'product_attributes.name as attribute_name')
            ->get();
    }

    public function find($id)
    {
        return ProductAttributeDetail::join('product_attributes', function ($join) {
            $join->on('product_attribute_details.product_attribute_id', '=', 'product_attributes.id')
                ->whereNull('product_attributes.deleted_at');
        })
            ->select('product_attribute_details.*', 'product_attributes.name as attribute_name')
            ->where('product_attribute_details.id', $id)
            ->whereNull('product_attribute_details.deleted_at')
            ->first();
    }
}
