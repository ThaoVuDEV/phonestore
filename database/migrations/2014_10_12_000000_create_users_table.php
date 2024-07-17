<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Tạo khóa chính kiểu bigInt tự tăng

            $table->string('name', 255); // Tạo cột name với chiều dài tối đa 255 ký tự
            $table->string('email', 255)->unique(); // Tạo cột email với chiều dài tối đa 255 ký tự và đảm bảo duy nhất
            $table->timestamp('email_verified_at')->nullable(); // Cột email_verified_at có thể null

            $table->string('password', 255); // Tạo cột password với chiều dài tối đa 255 ký tự
            $table->string('phone', 15)->unique(); // Tạo cột phone với chiều dài tối đa 15 ký tự và đảm bảo duy nhất
            $table->string('address', 255); // Tạo cột address với chiều dài tối đa 255 ký tự

            $table->enum('role', ['user', 'admin'])->default('user'); // Tạo cột role và giới hạn giá trị là 'user' hoặc 'admin', mặc định là 'user'

            $table->rememberToken(); // Tạo cột remember_token
            $table->timestamps(); // Tạo cột created_at và updated_at
            $table->softDeletes(); // Tạo cột deleted_at để hỗ trợ xóa mềm
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
