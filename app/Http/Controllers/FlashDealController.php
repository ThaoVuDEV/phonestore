<?php

namespace App\Http\Controllers;

use App\Models\FlashDeal;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashDealController extends Controller
{
    public function index()
    {
        $deals = FlashDeal::with('product')->get();
        return view('admin.products.flash_deal.list', compact('deals'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.products.flash_deal.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date'
        ]);

        FlashDeal::create($request->all());

        return redirect()->route('flash-deals.index')->with('success', 'Flash deal created successfully.');
    }

    public function edit(FlashDeal $deal)
    {
        $products = Product::all();
        return view('admin.products.flash_deal.edit', compact('deal', 'products'));
    }

    public function update(Request $request, FlashDeal $deal)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date'
        ]);

        $deal->update($request->all());

        return redirect()->route('flash-deals.index')->with('success', 'Flash deal updated successfully.');
    }

    public function destroy(FlashDeal $deal)
    {
        $deal->delete();

        return redirect()->route('flash-deals.index')->with('success', 'Flash deal deleted successfully.');
    }
}
