<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOrderStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('order_completed') && $request->is('checkout')) {
            return redirect()->route('home')->with('error', 'Bạn không thể truy cập trang checkout nữa.');
        }
        return $next($request);
    }
}
