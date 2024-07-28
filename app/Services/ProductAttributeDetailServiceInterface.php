<?php

namespace App\Services;

interface ProductAttributeDetailServiceInterface
{
    public function getAllAttributesDetail();
    public function getAttributeDetailByForeignKey($id);
    public function createAttributeDetail($data);
    public function updateAttributeDetail($attribute, $data);
    
    public function getAttributesDetailById($id);
}
