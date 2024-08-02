<?php

namespace App\Services;

use App\Repositories\CapacityRepository;

class CapacityService 
{

    protected $capacityRepo;

    public function __construct(CapacityRepository $capacityRepo)
    {
        $this->capacityRepo = $capacityRepo;
    }
    public function getAllCapacities()
    {
        return $this->capacityRepo->all();
    }
  
    public function createCapacity($data)
    {
        return $this->capacityRepo->create($data);
    }
    public function updateCapacity($attribute, $data)
    {
        return $this->capacityRepo->update($attribute, $data);
    }
    public function getCapacityById($id)
    {
        return  $this->capacityRepo->find($id);
    }
    public function deleteCapacityByID($id)
    {
        $attribute = $this->capacityRepo->find($id);
        if ($attribute) {
            return $this->capacityRepo->delete($attribute);
        }
        return false;
    }
}
