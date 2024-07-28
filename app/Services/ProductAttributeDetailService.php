<?php

namespace App\Services;

use App\Repositories\ProductAttributeDetailRepository;

class ProductAttributeDetailService implements ProductAttributeDetailServiceInterface
{

    protected $attributeDetailRepo;

    public function __construct(ProductAttributeDetailRepository $attributeDetailRepo)
    {
        $this->attributeDetailRepo = $attributeDetailRepo;
    }
    public function getAllAttributesDetail()
    {
        $this->attributeDetailRepo->all();
    }
    public function getAttributeDetailByForeignKey($id)
    {
        return $this->attributeDetailRepo->findByForeignKey($id);
    }
    public function createAttributeDetail($data)
    {
        return $this->attributeDetailRepo->create($data);
    }
    public function updateAttributeDetail($attribute, $data)
    {
        return $this->attributeDetailRepo->update($attribute, $data);
    }
    public function getAttributesDetailById($id)
    {
        return  $this->attributeDetailRepo->find($id);
    }
    public function deleteAttributesDetailByID($id)
    {
        $attribute = $this->attributeDetailRepo->find($id);
        if ($attribute) {
            return $this->attributeDetailRepo->delete($attribute);
        }
        return false;
    }
}
