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
        Schema::table('product_variants', function (Blueprint $table) {
            // Thay đổi cấu trúc của cột 'stock' để thêm giá trị mặc định
            $table->integer('stock')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            // Trở lại cấu trúc cột 'stock' mà không có giá trị mặc định
            $table->integer('stock')->change();
        });
    }
};
