<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorySeed = [
            [
                'name' => 'Laptop',    
            ],
            [
                'name' => 'Âm Thanh',
            ],
            [
                'name' => 'Đồng hồ',
            ],
            [
                'name' => 'Camera',
            ],
            [
                'name' => 'Màn Hình',
            ],

        ];
    
        DB::table('categories')->insert($categorySeed);
    }
}
