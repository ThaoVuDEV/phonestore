<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $timezone = env('APP_TIMEZONE', 'UTC'); // Mặc định là UTC nếu không tìm thấy trong .env
        date_default_timezone_set($timezone);
    }
}
