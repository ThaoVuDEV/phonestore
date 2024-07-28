<?php 


namespace App\Services;

use App\Repositories\ProductVariantRepository;

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
public function updateProductVariants($productId, $variantNames, $variantPrices, $variantQuantities, $variantImages)
{
    // Xóa các biến thể cũ trước khi thêm mới
    $this->productVariantRepo->deleteByProductId($productId);

    // Lưu các biến thể mới
    foreach ($variantNames as $index => $name) {
        $images = $variantImages[$index] ?? [];
        $imagePaths = [];

        if (is_array($images)) {
            foreach ($images as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
                    $fileName = uniqid() . '-' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('public/uploads', $fileName);
                    $imagePaths[] = $filePath;
                }
            }
        }

        $this->productVariantRepo->create([
            'product_id' => $productId,
            'name' => $name,
            'price' => $variantPrices[$index],
            'stock' => $variantQuantities[$index],
            'image' => !empty($imagePaths) ? json_encode($imagePaths) : null,
        ]);
    }
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
    public function ProTrashVariant(){
        return $this->productVariantRepo->onlyTrashed();
    }
}
