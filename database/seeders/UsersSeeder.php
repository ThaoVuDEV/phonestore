<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userSeed = [];
    
        // Tạo người dùng admin với email cố định và mật khẩu cố định
        $userSeed[] = [
            'name' => 'Admin User', // Bạn có thể thay đổi tên người dùng admin nếu muốn
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // Mã hóa mật khẩu
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'role' => 'admin', // Người dùng này là admin
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
    
        DB::table('users')->insert($userSeed);
    }
}
