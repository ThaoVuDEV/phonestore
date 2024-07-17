<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeDetailsSeed = [
            [
                'product_attribute_id' => 1, // Thay thế bằng product_attribute_id của "Màu sắc"
                'value' => 'Đỏ',
            ],
            [
                'product_attribute_id' => 1,
                'value' => 'Trắng',
            ],
            [
                'product_attribute_id' => 1,
                'value' => 'Đen',

            ],
            [
                'product_attribute_id' => 2, // Thay thế bằng product_attribute_id của "Dung lượng"
                'value' => '64GB',
            ],
            [
                'product_attribute_id' => 2,
                'value' => '128GB',
            ],
        ];

        DB::table('product_attribute_details')->insert($attributeDetailsSeed);
    }
}
