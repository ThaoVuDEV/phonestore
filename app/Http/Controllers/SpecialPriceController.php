<?php

namespace App\Http\Controllers;

use App\Models\SpecialPrice;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpecialPriceController extends Controller
{
    public function index()
    {
        $specialPrices = SpecialPrice::with('product')->get();
        return view('admin.products.special_prices.list', compact('specialPrices'));
    }

    public function create()
    {
        $products = Product::all(); // Lấy danh sách sản phẩm
        return view('admin.products.special_prices.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'special_price' => 'required|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        SpecialPrice::create($request->all());
        return redirect()->route('special-prices.index')->with('success', 'Special price created successfully.');
    }

    public function edit(SpecialPrice $specialPrice)
    {
        $products = Product::all(); // Lấy danh sách sản phẩm
        return view('admin.products.special_prices.edit', compact('specialPrice', 'products'));
    }

    public function update(Request $request, SpecialPrice $specialPrice)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'special_price' => 'required|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $specialPrice->update($request->all());
        return redirect()->route('special-prices.index')->with('success', 'Special price updated successfully.');
    }

    public function destroy(SpecialPrice $specialPrice)
    {
        $specialPrice->delete();
        return redirect()->route('special-prices.index')->with('success', 'Special price deleted successfully.');
    }
    
    
}
