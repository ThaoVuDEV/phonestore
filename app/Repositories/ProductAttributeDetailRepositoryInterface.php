<?php

namespace App\Repositories;

use App\Models\ProductAttributeDetail;

interface ProductAttributeDetailRepositoryInterface
{
    public function all();
    public function create($data);
    public function update(ProductAttributeDetail $attributesDetail, $data);
    public function delete(ProductAttributeDetail $attributesDetail);
    public function findByForeignKey($foreignKeyValue);
    public function find($id);
}
