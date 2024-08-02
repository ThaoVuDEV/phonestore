<?php

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Support\Facades\Log;

class ColorRepository 
{
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function all()
    {
        return $this->color->get();
    }

    public function create($data)
    {
        return $this->color->create($data);
    }

    public function update(Color $color, $data)
    {
        return $color->update($data);
    }

    public function delete(Color $color)
    {
        return $color->delete();
    }

    public function forceDelete(Color $color)
    {
        try {
            return $color->forceDelete();
        } catch (\Exception $e) {
            // Ghi log lỗi hoặc xử lý lỗi tùy theo yêu cầu của bạn
            Log::error('Error in forceDelete: ' . $e->getMessage());
            return false;
        }
    }

    public function find($id)
    {
        return $this->color->find($id);
    }

    public function paginate($perPage = 5, $columns = ['*'],$searchTerm= null)
    {
       $query = $this->color;
        if($searchTerm){
            $query->where('name','like', '%'.$searchTerm.'%');
        }
        return $query->paginate($perPage,$columns);
    }

   
    public function search($query)
{
    return $this->color->where('name', 'LIKE', "%{$query}%")
        ->paginate(10); // Số lượng bản ghi mỗi trang
}
}
