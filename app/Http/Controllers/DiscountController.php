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

    private function generateCouponCode($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $couponCode = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $couponCode .= $characters[rand(0, $charactersLength - 1)];
        }
        return $couponCode;
    }
    // Hiển thị trang tạo giảm giá
    public function create()
    {
        $code = $this->generateCouponCode();
        return view('admin.discounts.create', compact('code'));
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
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'code' => 'required|string',

        ], ['code.required' => 'Vui lòng nhập mã']);

        $code = $request->input("code");

        $coupon = Discount::where("code", $code)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if ($coupon) {
            session()->put('coupon', [
                'code' => $coupon->code,
                'discount_type' => $coupon->discount_type,
                'value' => $coupon->value,
                'id' => $coupon->id,
            ]);
            return redirect()->back()->with('status', 'Mã giảm giá đã được áp dụng.');
        } else {
            session()->forget('coupon');

            return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ.');
        }
    }

   
}
