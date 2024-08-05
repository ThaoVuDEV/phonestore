<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\DealOfTheWeek;
use App\Models\FeaturedProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\Review;
use App\Models\SpecialPrice;
use App\Services\CapacityService;
use App\Services\CategoryService;
use App\Services\ColorService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
    protected $categoryService;
    protected $productService;
    protected $featuredProduct;
    protected $onSaleProduct;
    protected $productVariant;
    protected $colorService;
    protected $capacityService;
    protected $ueser;
    protected $dealOfTheWeek;
    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        FeaturedProduct $featuredProduct,
        SpecialPrice $onSaleProduct,
        ProductVariantService $productVariant,
        ColorService $colorService,
        CapacityService $capacityService,
        DealOfTheWeek $dealOfTheWeek,
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->featuredProduct = $featuredProduct;
        $this->onSaleProduct = $onSaleProduct;
        $this->productVariant = $productVariant;
        $this->colorService = $colorService;
        $this->capacityService = $capacityService;
        $this->dealOfTheWeek = $dealOfTheWeek;
    }
    public function index()
    {
        $proFeatured = $this->featuredProduct->listFeatured(8);
        $categories = $this->categoryService->getAllCategories();
        $onSaleProducts = $this->onSaleProduct->getAll();
        $dealOfTheWeek = $this->dealOfTheWeek->listDeal(5);
        $banner = new Banner();
        $banners= $banner::all();
        
        // Xử lý giỏ hàng
        $cartItems = [];
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)
                ->with(['product', 'variant'])
                ->get();
        }

        return view('client.home.main', compact('categories', 'proFeatured', 'onSaleProducts', 'cartItems', 'dealOfTheWeek','banners'));
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $categoryId = $request->input('category');
        $products = $this->productService->searchByNameAndCategory($name, $categoryId);
        $categories = $this->categoryService->getAllCategories();

        return view('', compact('products', 'categories'));
    }
    public function getProductList($id)
    {
        $proList = $this->productService->getProductByCate($id);
        return view('client.products.product', compact('proList'));
    }
    public function getProductDetail($id)
    {
        $proDetail = $this->productVariant->getProductVariantById($id);
        $colors = $this->colorService->getAllColor();
        $capacities = $this->capacityService->getAllCapacities();
        $onSaleProducts = $this->onSaleProduct->getAll();
        $RelatedPro = ProductVariant::with('product')->where('product_id', $proDetail->product->id)->get();
        $reviews = Review::where('product_id',$proDetail->product->id)->get();

        return view('client.products.product_detail', compact('proDetail', 'onSaleProducts', 'colors', 'capacities','reviews'));
    }
    public function gettDetail($id)
    {
        $proDetail = ProductVariant::with('product')->where('product_id', $id)->first();

        $colors = $this->colorService->getAllColor();
        $capacities = $this->capacityService->getAllCapacities();
        $onSaleProducts = $this->onSaleProduct->getAll();
        // Lấy tất cả sản phẩm liên quan có cùng product_id với sản phẩm hiện tại
        $relatedPro = ProductVariant::with('product')
            ->where('product_id', $proDetail->product_id)
            ->where('id', '!=', $proDetail->id) // Loại bỏ sản phẩm hiện tại khỏi danh sách liên quan
            ->get();
            $reviews = Review::where('product_id',$id)->get();
        return view('client.products.product_detail1', compact('proDetail', 'onSaleProducts', 'colors', 'capacities', 'relatedPro','reviews'));
    }
    public function getProductVariant(Request $request)
    {
        // Validate input parameters
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'nullable|exists:colors,id',
            'capacity_id' => 'nullable|exists:capacities,id',
        ]);

        try {
            $product_id = $request->input('product_id');
            $color_id = $request->input('color_id');
            $capacity_id = $request->input('capacity_id');

            // Query for the product variant based on provided parameters
            $variantQuery = ProductVariant::query()->where('product_id', $product_id);

            if ($color_id) {
                $variantQuery->where('color_id', $color_id);
            }

            if ($capacity_id) {
                $variantQuery->where('capacity_id', $capacity_id);
            }

            // Get the first matching variant or return null if not found
            $variant = $variantQuery->first();

            if ($variant) {
                // Convert image paths to the full URL
                $images = json_decode($variant->image, true) ?? [];
                $images = array_map(function ($image) {
                    return asset('storage/uploads/' . basename($image));
                }, $images);

                return response()->json([
                    'variant' => [
                        'id' => $variant->id,
                        'product_id' => $variant->product_id,
                        'color_id' => $variant->color_id,
                        'capacity_id' => $variant->capacity_id,
                        'price' => $variant->price,
                        'stock' => $variant->stock,
                        'images' => $images // Trả về danh sách ảnh đã được cập nhật
                    ]
                ]);
            }

            return response()->json(['variant' => null]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi'], 500);
        }
    }
    public function test()
    {
        return view('client.cart.ordercompleted');
    }
}
