<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all()
    {
        return $this->product->whereNull('deleted_at')->get();
    }

    public function create($data)
    {
        return $this->product->create($data);
    }

    public function update(Product $product, $data)
    {
        return $product->update($data);
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }

    public function find($id)
    {

        return $this->product->whereNull('deleted_at')->find($id);
    }

    public function paginate($perPage = 5, $columns = ['*'], $searchTerm = null)
    {
        $query = $this->product->join('categories', function ($join) {
            $join->on('products.category_id', '=', 'categories.id')
                ->whereNull('categories.deleted_at');
        })
            ->whereNull('products.deleted_at')
            ->select('products.*', 'categories.name as cate_name');

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('products.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('products.description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('categories.name', 'like', '%' . $searchTerm . '%');
            });
        }

        return $query->paginate($perPage, $columns);
    }


    public function onlyTrashed()
    {
        return $this->product->onlyTrashed()->paginate(5);
    }

    public function restore($id)
    {
        $product = $this->product->onlyTrashed()->find($id);
        if ($product) {
            $product->restore();
            return $product;
        }
        return null;
    }
    public function productGetById($id)
    {
        return $this->product
            ->with(['productVariants', 'category']) 
            ->where('products.id', $id)
            ->whereNull('products.deleted_at')
            ->first(); 
    }
     
}
