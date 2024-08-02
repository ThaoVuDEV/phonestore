<?php

namespace App\Repositories;

use App\Models\Capacity;


class CapacityRepository
{
    protected $capacity;

    public function __construct(Capacity $capacity)
    {
        $this->capacity = $capacity;
    }

    public function all()
    {
        return $this->capacity->get();
    }
    public function find($id)
    {
        return $this->capacity->findOrFail($id);
    }
    public function create($data)
    {
        return $this->capacity->create($data);
    }

    public function update(Capacity $capacity, $data)
    {
        $capacity->fill($data); // Điền dữ liệu vào đối tượng
        return $capacity->save(); // Lưu lại đối tượng
    }

    public function delete(Capacity $capacity)
    {
        return $capacity->delete();
    }
}
