<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
        View::composer(['client.layouts.master'], function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
        View::composer(['client.layouts.master', 'client.component.sidebar'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $cartItems = Cart::where('user_id', $user->id)
                    ->with(['product', 'variant'])
                    ->get();
                $view->with('cartItems', $cartItems);
            }
        });
    }
}
