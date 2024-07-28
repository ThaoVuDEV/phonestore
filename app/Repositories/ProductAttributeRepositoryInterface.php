<?php

namespace App\Repositories;

use App\Models\ProductAttribute;

interface  ProductAttributeRepositoryInterface
{
    public function all();
    public function create($data);
    public function update(ProductAttribute $attribute, $data);
    public function delete(ProductAttribute $attribute);
    public function find($id);
    public function paginate($perPage = 5, $columns = ['*']);
    public function attributes_trash();
}
