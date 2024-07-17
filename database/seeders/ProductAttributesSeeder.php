<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeSeed = [
            [
                'name' => 'Màu sắc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dung lượng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('product_attributes')->insert($attributeSeed);
    }
}
