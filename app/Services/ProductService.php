<?php 


namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository  $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts()
    {
        return $this->productRepo->all();
    }

    public function createProduct($data)
    {
        return $this->productRepo->create($data);
    }

    public function updateProduct($product, $data)
    {
        return $this->productRepo->update($product, $data);
    }

    public function deleteProduct($product)
    {
        return $this->productRepo->delete($product);
    }

    public function getProductById($id)
    {
        return $this->productRepo->find($id);
    }
}
