<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Hiển thị danh sách giảm giá
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discounts.list', compact('discounts'));
    }

    // Hiển thị trang tạo giảm giá
    public function create()
    {
        return view('admin.discounts.create');
    }

    // Lưu giảm giá mới
    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|string|max:255|unique:discounts',
            'description' => 'nullable|string|max:1000',
            'discount_type' => 'required|string|in:percentage,fixed_amount',
            'value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:0',
        ]);

        Discount::create($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    // Hiển thị trang chỉnh sửa giảm giá
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit', compact('discount'));
    }

    // Cập nhật giảm giá
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:discounts,code,' . $discount->id,
            'description' => 'nullable|string|max:1000',
            'discount_type' => 'required|string|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:0',
        ]);

        $discount->update($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    // Xóa giảm giá
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);
    
        $coupon = Discount::where('code', $request->input('coupon_code'))
                        ->where('start_date', '<=', now())
                        ->where('end_date', '>=', now())
                        ->first();
    
        if ($coupon) {
            // Tính toán giảm giá
            $discount = $coupon->discount_type === 'fixed_amount'
                        ? $coupon->value
                        : ($coupon->value / 100) * $request->input('total_amount');
    
            return response()->json([
                'success' => true,
                'discount' => $discount,
                'message' => 'Mã giảm giá đã được áp dụng.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mã giảm giá không hợp lệ.'
            ]);
        }
    }
}
