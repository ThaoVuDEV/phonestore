<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variantSeed = [
            [
                'name' => 'iPhone 15',
                'price' => 1500.00,
                'stock' => 10,
                'product_id' => 1, // Thay thế bằng product_id của iPhone trong bảng products
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung Z Fold',
                'price' => 2000.00,
                'stock' => 10,
                'product_id' => 2, // Thay thế bằng product_id của Samsung Z Fold trong bảng products
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('product_variants')->insert($variantSeed);
    }
}
