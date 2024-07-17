<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variantAttributesSeed = [
            [
                'attribute_value' => 'Đỏ',
                'variant_id' => 1,
                'attribute_id' => 1,
            ],
            [
                'attribute_value' => 'Trắng',
                'variant_id' => 2,
                'attribute_id' => 2,
              
            ],
            [
                'attribute_value' => '64GB',
                'variant_id' => 1, 
                'attribute_id' => 1, 
            ],
            [
                'attribute_value' => '128GB',
                'variant_id' => 2,
                'attribute_id' => 2,
             
            ],
        ];

        DB::table('product_variant_attributes')->insert($variantAttributesSeed);
    }
}
