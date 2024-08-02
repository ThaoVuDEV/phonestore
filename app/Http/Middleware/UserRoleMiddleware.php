<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        // Người dùng đã đăng nhập, kiểm tra vai trò của họ
        if (Auth::user()->role === 'user') {
            return $next($request); // Cho phép truy cập tiếp vào route
        }

        // Người dùng không có quyền admin, có thể quay lại đăng nhập hoặc xử lý khác
        return redirect()->route('user.login')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
