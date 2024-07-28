<?php

namespace App\Services;

use App\Models\ProductAttribute;
use App\Repositories\ProductAttributeRepository;

class ProductAttributeService implements ProductAttributeServiceInterface
{

    protected $attributeRepo;

    public function __construct(ProductAttributeRepository $attributeRepo)
    {
        $this->attributeRepo = $attributeRepo;
    }
    public function getAllAttributes()
    {
        return $this->attributeRepo->all();
    }
    public function getAttributeById($id)
    {
        return $this->attributeRepo->find($id);
    }
    public function paginateAttributes($perPage = 5, $columns = ['*'],$searchTerm=null)
    {
        return $this->attributeRepo->paginate($perPage, $columns,$searchTerm);
    }
    public function trashAttributes()
    {
        return $this->attributeRepo->attributes_trash();
    }
    public function createAttribute($data)
    {
        return $this->attributeRepo->create($data);
    }
    public function updateAttribute($attribute, $data)
    {
        return $this->attributeRepo->update($attribute, $data);
    }
    public function deleteAttribute($data)
    {

        // Tìm nạp đối tượng ProductAttribute dựa trên ID
        $attribute = $this->attributeRepo->find($data);
        // Kiểm tra xem đối tượng có tồn tại không
        if ($attribute) {
            // Gọi phương thức delete của ProductAttributeRepository với đối tượng ProductAttribute
            return $this->attributeRepo->delete($attribute);
        }

        // Xử lý trường hợp không tìm thấy đối tượng
        return false;
    }
    public function forceDeleteAttribute($data)
    {
        $attribute = $this->attributeRepo->find($data);
        if ($attribute) {
            return $this->attributeRepo->forceDelete($attribute);
        }

        return false;
    }
    public function searchAttributes($query)
    {
        return $this->attributeRepo->search($query);
    }
}
