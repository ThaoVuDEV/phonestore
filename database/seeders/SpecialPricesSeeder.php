<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialPricesSeed = [
            [
                'product_id' => 1, 
                'special_price' => 1200.00,
                'start_date' => now(),
                'end_date' => now()->addDays(7), // Giả sử giá đặc biệt áp dụng trong 7 ngày từ ngày hiện tại
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2, 
                'special_price' => 1800.00,
                'start_date' => now(), 
                'end_date' => now()->addDays(5), // Giả sử giá đặc biệt áp dụng trong 5 ngày từ ngày hiện tại
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('special_prices')->insert($specialPricesSeed);
    }
}
