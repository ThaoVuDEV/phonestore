<?php


namespace App\Services;

use App\Models\ProductVariant;
use App\Repositories\ProductVariantRepository;
use Illuminate\Support\Facades\Log;

class ProductVariantService
{
    protected $productVariantRepo;

    public function __construct(ProductVariantRepository  $productVariantRepo)
    {
        $this->productVariantRepo = $productVariantRepo;
    }

    public function getAllProductVariants()
    {
        return $this->productVariantRepo->all();
    }

    public function createProductVariant($data)
    {
        return $this->productVariantRepo->create($data);
    }

    // ProductVariantService.php
    public function updateProductVariant($id, array $data)
    {
        $variant = $this->productVariantRepo->find($id);
        if ($variant) {
            $updated = $variant->update($data);
            if ($updated) {
                Log::info('Variant updated:', $data);
            } else {
                Log::warning('Update failed for variant:', ['id' => $id]);
            }
            return $variant;
        }
        return null;
    }


    public function deleteProductVariant($product)
    {
        return $this->productVariantRepo->delete($product);
    }

    public function getProductVariantById($id)
    {
        return $this->productVariantRepo->getProductVariantById($id);
    }
    public function paginateProductVariants($perPage = 5, $columns = ['*'])
    {
        return $this->productVariantRepo->paginate($perPage, $columns);
    }
    public function ProTrashVariant()
    {
        return $this->productVariantRepo->onlyTrashed();
    }
}
