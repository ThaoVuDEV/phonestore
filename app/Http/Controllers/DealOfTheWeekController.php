<?php

// app/Http/Controllers/DealOfTheWeekController.php

namespace App\Http\Controllers;

use App\Models\DealOfTheWeek;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\SpecialPrice;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;

class DealOfTheWeekController extends Controller
{
    protected $productService;
    protected $productVariantService;
    protected $SpecialPrice;
    protected $dealOfTheWeek;

    public function __construct(ProductService $productService, SpecialPrice $SpecialPrice, ProductVariantService $productVariantService, DealOfTheWeek $dealOfTheWeek)
    {
        $this->productService    = $productService;
        $this->SpecialPrice      = $SpecialPrice;
        $this->productVariantService = $productVariantService;
        $this->dealOfTheWeek  = $dealOfTheWeek;
    }
    public function index()
    {
        $deals = $this->dealOfTheWeek
            ->where('start_date', '<=', now()->endOfWeek())
            ->where('end_date', '>=', now()->startOfWeek())
            ->get();

   

        return view('admin.products.deals_of_the_week.list', compact('deals'));
    }
    public function create()
    {
        $products = Product::with('productVariants')->get(); // Lấy danh sách sản phẩm
        return view('admin.products.deals_of_the_week.create', compact('products'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            // Không cần validate end_date vì chúng ta sẽ tính toán sau
        ]);

        // Tính toán ngày kết thúc là 1 tuần sau ngày bắt đầu
        $startDate = new \DateTime($request->input('start_date'));
        $endDate = $startDate->modify('+1 week')->format('Y-m-d H:i:s');

        // Tạo bản ghi khuyến mãi
        $this->dealOfTheWeek->create([
            'product_variant_id' => $request->input('product_variant_id'),
            'discount' => $request->input('discount'),
            'start_date' => $request->input('start_date'),
            'end_date' => $endDate
        ]);


        return redirect()->route('deals-of-the-week.index')->with('status', 'Deal created successfully!');
    }

    public function edit(DealOfTheWeek $deals)
    {
        $products = Product::all(); // Lấy danh sách sản phẩm
        return view('admin.products.special_prices.edit', compact('deals', 'products'));
    }

    public function update(Request $request, DealOfTheWeek $deals)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'special_price' => 'required|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $deals->update($request->all());
        return redirect()->route('special-prices.index')->with('success', 'Special price updated successfully.');
    }

    public function destroy(DealOfTheWeek $deals)
    {
        $deals->delete();
        return redirect()->route('special-prices.index')->with('success', 'Special price deleted successfully.');
    }
}
