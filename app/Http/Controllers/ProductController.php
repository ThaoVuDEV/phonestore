<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\Color;
use App\Models\FeaturedProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeDetail;
use App\Models\ProductVariant;
use App\Models\SpecialPrice;
use App\Services\CapacityService;
use App\Services\CategoryService;
use App\Services\ColorService;
use App\Services\ProductAttributeService;
use App\Services\ProductService;

use App\Services\ProductVariantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $colorService;
    protected $capacityService;

    protected $productVariantService;
    protected $featuredProduct;
    protected $productVariantAttributeService;
    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        ProductVariantService $productVariantService,
        FeaturedProduct $featuredProduct,
        ColorService $colorService,
        CapacityService $capacityService,

    ) {
        $this->productService        = $productService;
        $this->productVariantService = $productVariantService;
        $this->categoryService       = $categoryService;
        $this->featuredProduct       = $featuredProduct;
        $this->colorService          = $colorService;
        $this->capacityService       = $capacityService;
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
        $colors = $this->colorService->getAllColor();
        $capacities = $this->capacityService->getAllCapacities();
        return view('admin.products.create', compact('categories', 'colors', 'capacities'));
    }
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_pro' => 'nullable|file|image|max:2048',
            'variant_attributes' => 'required|array',
            'variant_attributes.*' => 'required|string', // Mỗi phần tử của variant_attributes phải là chuỗi
            'variant_prices' => 'required|array',
            'variant_prices.*' => 'required|numeric|min:0', // Giá phải là số và không âm
            'variant_quantities' => 'required|array',
            'variant_quantities.*' => 'required|integer|min:0', // Số lượng phải là số nguyên không âm
            'variant_images' => 'nullable|array',
            'variant_images.*.*' => 'nullable|file|image|max:2048',
            'variant_colors' => 'nullable|array',
            'variant_colors.*' => 'nullable|exists:colors,id',
            'variant_capacities' => 'nullable|array',
            'variant_capacities.*' => 'nullable|exists:capacities,id',
        ]);

        // Lưu thông tin sản phẩm
        $productData = $request->only(['category_id', 'name', 'description']);

        // Xử lý ảnh sản phẩm nếu có
        if ($request->hasFile('image_pro')) {
            $image = $request->file('image_pro');
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/products/', $imageName);
            $productData['image'] = $imagePath;
        }

        // Tạo sản phẩm
        $product = $this->productService->createProduct($productData);

        // Xử lý biến thể
        $variantAttributes = $request->input('variant_attributes', []);
        $variantPrices = $request->input('variant_prices', []);
        $variantQuantities = $request->input('variant_quantities', []);
        $variantImages = $request->file('variant_images', []);
        $variantColors = $request->input('variant_color_ids', []);
        $variantCapacities = $request->input('variant_capacity_ids', []);

        foreach ($variantAttributes as $index => $attributeString) {
            // Phân tách các ID thuộc tính từ chuỗi
            $attributeIds = explode(',', $attributeString);

            if (
                isset($variantPrices[$index]) && !is_null($variantPrices[$index]) &&
                isset($variantQuantities[$index]) && !is_null($variantQuantities[$index])
            ) {
                // Xử lý ảnh biến thể nếu có
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

                // Tạo biến thể sản phẩm
                $this->productVariantService->createProductVariant([
                    'product_id' => $product->id,
                    'price' => $variantPrices[$index],
                    'stock' => $variantQuantities[$index],
                    'image' => !empty($imagePaths) ? json_encode($imagePaths) : null,
                    'color_id' => $variantColors[$index],
                    'capacity_id' => $variantCapacities[$index],
                ]);
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Thêm sản phẩm mới thành công');
    }







    public function show($id, ProductVariantService $productVariantService)
    {

        $productDetail = $this->productVariantService->getAllProductVariants($id);
        

        return view('admin.products.list_detail', compact('productDetail'));
    }




    public function edit($id)
    {
        $product = Product::with('productVariants.color', 'productVariants.capacity',)->findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();
        $capacities = Capacity::all();

        // Lấy các ID của color và capacity từ các variants của sản phẩm
        $selectedColorIds = $product->productVariants->pluck('color_id')->unique()->toArray();
        $selectedCapacityIds = $product->productVariants->pluck('capacity_id')->unique()->toArray();

        return view('admin.products.edit', compact('product', 'categories', 'colors', 'capacities', 'selectedColorIds', 'selectedCapacityIds'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_pro' => 'nullable|file|image|max:2048',
            'variant_prices' => 'required|array',
            'variant_prices.*' => 'required|numeric|min:0',
            'variant_quantities' => 'required|array',
            'variant_quantities.*' => 'required|integer|min:0',
            'variant_images' => 'nullable|array',
            'variant_images.*.*' => 'nullable|file|image|max:2048',
            'variant_colors' => 'nullable|array',
            'variant_colors.*' => 'nullable|exists:colors,id',
            'variant_capacities' => 'nullable|array',
            'variant_capacities.*' => 'nullable|exists:capacities,id',
            'existing_variant_ids' => 'nullable|array',
            'existing_variant_ids.*' => 'exists:product_variants,id',
        ]);

      
        $product = $this->productService->getProductById($id);
        $productData = $request->only(['category_id', 'name', 'description']);

        if ($request->hasFile('image_pro')) {
            $image = $request->file('image_pro');
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/products/', $imageName);

          
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $productData['image'] = $imagePath;
        }

       
        $this->productService->updateProduct($product, $productData);

       
        $variantPrices = $request->input('variant_prices', []);
        $variantQuantities = $request->input('variant_quantities', []);
        $variantImages = $request->file('variant_images', []);
        $variantColors = $request->input('variant_colors', []);
        $variantCapacities = $request->input('variant_capacities', []);
        $existingVariantIds = $request->input('variant_ids', []);

      
        foreach ($existingVariantIds as $index => $variantId) {
            $variant = $this->productVariantService->getProductVariantById($variantId);

            if ($variant) {
               
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

                
                $price = $variantPrices[$variantId] ?? $variant->price;
                $quantity = $variantQuantities[$variantId] ?? $variant->stock;

                $this->productVariantService->updateProductVariant($variantId, [
                    'price' => $price,
                    'stock' => $quantity,
                    'image' => !empty($imagePaths) ? json_encode($imagePaths) : $variant->image,
                    'color_id' => $variantColors[$index] ?? $variant->color_id,
                    'capacity_id' => $variantCapacities[$index] ?? $variant->capacity_id,
                ]);
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }






    public function destroy(String $id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Không tìm thấy danh mục.');
        }

        $this->productService->deleteProduct($product);
        return redirect()->route('products.index')->with('success', 'Xóa danh mục thành công.');
    }

    public function products_trash(Request $request)
    {
        $products = $this->productService->ProTrash();
        $title = 'Danh sách sản phẩm đã xóa';
        return view('admin.products.list', compact('products', 'title'));
    }
    public function restore(string $id)
    {
        $products = Product::withTrashed()->findOrFail($id);

        $products->restore();

        return redirect()->route('products.index')
            ->with('success', 'Khôi phục danh mục thành công.');
    }

    public function getFeaturedProducts($limit = 10)
    {
        return Product::whereHas('featured')->take($limit)->get();
    }

    public function getBestSellingProducts($limit = 10)
    {
        return Product::whereHas('bestSelling')->take($limit)->get();
    }

    public function listProFeatured()
    {
        $proFeatured = $this->featuredProduct->listFeatured(8);
        return view('admin.products.featured.list', compact('proFeatured'));
    }
    public function addFeatured(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $data = $request->only('product_id');

        $result = $this->featuredProduct->addFeaturedPro($data);


        if (!$result) {
            return redirect()->back()->with('error', 'thêm không thành công');
        }
        return redirect()->route('products.featured.index')->with('success', 'Thêm thành công.');
    }
    public function getVariants($productId)
    {
        $product = Product::findOrFail($productId);
        $variants = $product->variants; // Thay đổi tùy thuộc vào quan hệ của bạn

        return response()->json(['variants' => $variants]);
    }
}
