<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;

use Carbon\Carbon;

class DashboardController extends Controller
{
   public function index()
   {
      $today = Carbon::now('Asia/Ho_Chi_Minh');

      $startOfMonth = $today->copy()->startOfMonth();
      $startOfYear = $today->copy()->startOfYear();
      $startOfWeek = $today->copy()->startOfWeek();
      $startOfDay = $today->copy()->startOfDay();
      $endOfDay = $today->copy()->endOfDay();

    

      // Doanh thu trong ngày hôm nay
      $dailyRevenue = Order::whereBetween('created_at', [$startOfDay, $endOfDay])
         ->where('status', Order::STATUS_COMPLETED)
         ->sum('total_amount');


      $weeklyRevenue = Order::whereBetween('created_at', [$startOfWeek, $today])
         ->where('status', Order::STATUS_COMPLETED) 
         ->sum('total_amount');

      $monthlyRevenue = Order::whereBetween('created_at', [$startOfMonth, $today])
         ->where('status', Order::STATUS_COMPLETED) 
         ->sum('total_amount');

      $yearlyRevenue = Order::whereBetween('created_at', [$startOfYear, $today])
         ->where('status', Order::STATUS_COMPLETED) 
         ->sum('total_amount');

      $totalOrders = [
         'completed' => Order::where('status', Order::STATUS_COMPLETED)->count(),
         'pending' => Order::where('status', Order::STATUS_PENDING)->count(),
         'shipped' => Order::where('status', Order::STATUS_SHIPPED)->count(),
         'confirmed' => Order::where('status', Order::STATUS_CONFIRMED)->count(),
      ];

      $newOrders = [
         'completed' => Order::whereDate('created_at', $today)
            ->where('status', Order::STATUS_COMPLETED)
            ->count(),
         'pending' => Order::whereDate('created_at', $today)
            ->where('status', Order::STATUS_PENDING)
            ->count(),
         'shipped' => Order::whereDate('created_at', $today)
            ->where('status', Order::STATUS_SHIPPED)
            ->count(),
         'confirmed' => Order::whereDate('created_at', $today)
            ->where('status', Order::STATUS_CONFIRMED)
            ->count(),
      ];

      $totalCustomers = User::count();
      $newCustomers = User::whereDate('created_at', $today)->count();

      $totalProducts = Product::count() + ProductVariant::count();
      $availableProducts = Product::count();
      $lowStockProducts = ProductVariant::where('stock', '<=', 10)->count();

      $totalDiscounts = Discount::count();
      $usedDiscounts = Discount::where('used_count', '>', 0)->count();

      // Lấy dữ liệu danh mục
      $categories = Category::withCount('products')->get();
      $categoriesData = $categories->map(function ($category) {
         return [
            'name' => $category->name,
            'count' => $category->products_count,
         ];
      });

      return view('admin.dashboard.index', compact(
         'dailyRevenue',
         'weeklyRevenue',
         'monthlyRevenue',
         'yearlyRevenue',
         'totalOrders',
         'newOrders',
         'totalCustomers',
         'newCustomers',
         'totalProducts',
         'availableProducts',
         'lowStockProducts',
         'categoriesData',
         'totalDiscounts',
         'usedDiscounts'
      ));
   }
}
