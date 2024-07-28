<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeDetail;
use App\Models\ProductVariant;
use App\Services\CategoryService;
use App\Services\ProductAttributeService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $attributeService;
    protected $productVariantService;

    public function __construct(ProductService $productService, CategoryService $categoryService, ProductAttributeService $attributeService, ProductVariantService $productVariantService)
    {
        $this->productService = $productService;
        $this->productVariantService = $productVariantService;
        $this->categoryService = $categoryService;
        $this->attributeService = $attributeService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->input('search');
            $products = $this->productService->paginateProducts(10, ['*'], $searchTerm);
            return view('admin.products.partials.list', compact('products'))->render();
        }

        $products = $this->productService->paginateProducts(10);
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        $attributes = $this->attributeService->getAllAttributes();
        return view('admin.products.create', compact('categories', 'attributes'));
    }
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'variant_names' => 'required|array',
            'variant_prices' => 'required|array',
            'variant_quantities' => 'required|array',
            'variant_images' => 'nullable|array',
            'variant_images.*' => 'nullable|array',
            'variant_images.*.*' => 'nullable|file|image|max:2048',
        ]);

        // Lưu thông tin sản phẩm
        $productData = $request->only(['category_id', 'name', 'description']);
        $product = $this->productService->createProduct($productData);

        // Lọc và lưu thông tin biến thể
        $variantNames = $request->input('variant_names');
        $variantPrices = $request->input('variant_prices');
        $variantQuantities = $request->input('variant_quantities');
        $variantImages = $request->file('variant_images', []);

        $validVariants = [];

        foreach ($variantNames as $index => $name) {
            if (
                isset($variantPrices[$index]) && !is_null($variantPrices[$index]) &&
                isset($variantQuantities[$index]) && !is_null($variantQuantities[$index])
            ) {
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

                $validVariants[] = [
                    'product_id' => $product->id,
                    'name' => $name,
                    'price' => $variantPrices[$index],
                    'stock' => $variantQuantities[$index],
                    'image' => !empty($imagePaths) ? json_encode($imagePaths) : null,
                ];
            }
        }

        foreach ($validVariants as $variantData) {
            $this->productVariantService->createProductVariant($variantData);
        }

        return redirect()->route('products.index')
            ->with('success', 'Thêm sản phẩm mới thành công');
    }





    public function show($id, ProductVariantService $productVariantService)
    {

        $productDetail = $productVariantService->getProductVariantById($id);
        return view('admin.products.list_detail', compact('productDetail'));
    }




    public function edit(String $id)
    {
        $categories = $this->categoryService->getAllCategories();
        $attributes = $this->attributeService->getAllAttributes();
        $product = $this->productService->getProductById($id);

        return view('admin.products.edit', compact('categories', 'attributes', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'existing_variant_ids' => 'nullable|array',
            'existing_variant_ids.*' => 'exists:product_variants,id',
            'new_variant_ids' => 'nullable|array',
            'new_variant_ids.*' => 'exists:product_variants,id',
            'variant_names' => 'nullable|array',
            'variant_prices' => 'nullable|array',
            'variant_quantities' => 'nullable|array',
            'variant_images' => 'nullable|array',
            'variant_images.*' => 'nullable|array',
            'variant_images.*.*' => 'nullable|file|image|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Update product information
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
        ]);

        // Update existing variants
        $existingVariantIds = $request->input('existing_variant_ids', []);
        foreach ($existingVariantIds as $variantId) {
            $variant = ProductVariant::find($variantId);
            if ($variant) {
                $variant->update([
                    'name' => $request->input("variant_names.${variantId}"),
                    'price' => $request->input("variant_prices.${variantId}"),
                    'stock' => $request->input("variant_quantities.${variantId}"),
                ]);

                // Handle image upload if present
                $images = $request->file("variant_images.${variantId}", []);
                $imagePaths = [];
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
                            $fileName = uniqid() . '-' . $image->getClientOriginalName();
                            $filePath = $image->storeAs('public/uploads', $fileName);
                            $imagePaths[] = $filePath;
                        }
                    }
                    $variant->update(['image' => !empty($imagePaths) ? json_encode($imagePaths) : null]);
                }
            }
        }

        // Add new variants
        $newVariantIds = $request->input('new_variant_ids', []);
        foreach ($newVariantIds as $variantId) {
            $newVariantData = [
                'product_id' => $product->id,
                'name' => $request->input("variant_names.${variantId}"),
                'price' => $request->input("variant_prices.${variantId}"),
                'stock' => $request->input("variant_quantities.${variantId}"),
            ];

            $newVariant = ProductVariant::updateOrCreate(
                ['id' => $variantId],
                $newVariantData
            );

            // Handle image upload if present
            $images = $request->file("variant_images.${variantId}", []);
            $imagePaths = [];
            if (is_array($images)) {
                foreach ($images as $image) {
                    if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
                        $fileName = uniqid() . '-' . $image->getClientOriginalName();
                        $filePath = $image->storeAs('public/uploads', $fileName);
                        $imagePaths[] = $filePath;
                    }
                }
                $newVariant->update(['image' => !empty($imagePaths) ? json_encode($imagePaths) : null]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }




    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function attributes_trash(Request $request)
    {
        $attributes = $this->productService->ProTrash();
        $title = 'Danh sách sản phẩm đã xóa';
        return view('admin.attributes.list', compact('attributes', 'title'));
    }
    public function getAttributeDetails($ids)
    {
        // Tách các ID thuộc tính
        $attributeIds = explode(',', $ids);

        // Lấy tất cả các thuộc tính dựa trên ID
        $attributes = ProductAttributeDetail::whereIn('product_attribute_id', $attributeIds)
            ->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($attributes);
    }
}
