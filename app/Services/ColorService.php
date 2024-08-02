<?php

namespace App\Services;

use App\Repositories\ColorRepository;

class ColorService 
{

    protected $colorRepo;

    public function __construct(ColorRepository $capacityRepo)
    {
        $this->colorRepo = $capacityRepo;
    }
    public function getAllColor()
    {
        return $this->colorRepo->all();
    }
    public function getColorById($id)
    {
        return $this->colorRepo->find($id);
    }
    public function paginateColor($perPage = 5, $columns = ['*'],$searchTerm=null)
    {
        return $this->colorRepo->paginate($perPage, $columns,$searchTerm);
    }
    public function createColor($data)
    {
        $existingColor = $this->colorRepo->find($data['id']);
        if ($existingColor) {
            throw new \Exception('Color with the same name already exists.');
        }

        return $this->colorRepo->create([
            'name' => $data['color_name'],
            'code' => $data['color_code'],
        ]);
    }
    public function updateColor($id, $data)
    {
        $color = $this->colorRepo->find($id);
        if (!$color) {
            throw new \Exception('Color not found.');
        }

        return $this->colorRepo->update($color, [
            'name' => $data['color_name'],
            'code' => $data['color_code'],
        ]);
    }
    public function deleteColor($data)
    {

        // Tìm nạp đối tượng ProductAttribute dựa trên ID
        $attribute = $this->colorRepo->find($data);
        // Kiểm tra xem đối tượng có tồn tại không
        if ($attribute) {
            // Gọi phương thức delete của ProductAttributeRepository với đối tượng ProductAttribute
            return $this->colorRepo->delete($attribute);
        }

        // Xử lý trường hợp không tìm thấy đối tượng
        return false;
    }
   
}
