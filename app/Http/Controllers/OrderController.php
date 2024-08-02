<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      // Lấy tất cả đơn hàng
        $orders = Order::paginate(10);

        // Trả về view với dữ liệu đơn hàng
        return view('admin.orders.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordersDetail = OrderDetail::where('order_id',$id)->get();
   
        return view('admin.orders.list_detail',compact('ordersDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function confirmOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = Order::STATUS_CONFIRMED;
            $order->save();
            return redirect()->route('orders.index')->with('status', 'Đơn hàng đã được xác nhận.');
        }
        return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
    }

    public function shipOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = Order::STATUS_SHIPPED;
            $order->save();
            return redirect()->route('orders.index')->with('status', 'Đơn hàng đang được giao.');
        }
        return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
    }

    public function completeOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = Order::STATUS_COMPLETED;
            $order->save();
            return redirect()->route('orders.index')->with('status', 'Đơn hàng đã hoàn thành.');
        }
        return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
    }
}
