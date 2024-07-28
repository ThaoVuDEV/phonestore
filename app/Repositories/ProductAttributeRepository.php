<?php

namespace App\Repositories;

use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Log;

class ProductAttributeRepository implements ProductAttributeRepositoryInterface
{
    protected $attribute;

    public function __construct(ProductAttribute $attribute)
    {
        $this->attribute = $attribute;
    }

    public function all()
    {
        return $this->attribute->whereNull('deleted_at')->get();
    }

    public function create($data)
    {
        return $this->attribute->create($data);
    }

    public function update(ProductAttribute $attribute, $data)
    {
        return $attribute->update($data);
    }

    public function delete(ProductAttribute $attribute)
    {
        return $attribute->delete();
    }

    public function forceDelete(ProductAttribute $attribute)
    {
        try {
            return $attribute->forceDelete();
        } catch (\Exception $e) {
            // Ghi log lỗi hoặc xử lý lỗi tùy theo yêu cầu của bạn
            Log::error('Error in forceDelete: ' . $e->getMessage());
            return false;
        }
    }

    public function find($id)
    {
        return $this->attribute->whereNull('deleted_at')->find($id);
    }

    public function paginate($perPage = 5, $columns = ['*'],$searchTerm= null)
    {
       $query = $this->attribute->whereNull('deleted_at');
        if($searchTerm){
            $query->where('name','like', '%'.$searchTerm.'%');
        }
        return $query->paginate($perPage,$columns);
    }

    public function attributes_trash()
    {
        return $this->attribute->onlyTrashed()->paginate(5);
    }
    public function search($query)
{
    return $this->attribute->where('name', 'LIKE', "%{$query}%")
        ->paginate(10); // Số lượng bản ghi mỗi trang
}
}
