<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Lấy danh sách category_id từ bảng categories
          $categoryIds = DB::table('categories')->pluck('id')->toArray();

          if (empty($categoryIds)) {
              $this->command->warn('No categories found, please seed categories first.');
              return;
          }
  
          $productSeed = [
              [
                  'name' => 'iPhone',
                  'description' => 'Apple iPhone with latest features',
                  'category_id' => $categoryIds[array_rand($categoryIds)], // Chọn ngẫu nhiên một category_id
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                  'name' => 'Samsung',
                  'description' => 'Samsung smartphone with cutting-edge technology',
                  'category_id' => $categoryIds[array_rand($categoryIds)], // Chọn ngẫu nhiên một category_id
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
          ];
  
          DB::table('products')->insert($productSeed);
      }
}

