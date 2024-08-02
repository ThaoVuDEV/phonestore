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
        Schema::table('orders', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cột status từ string thành integer
            $table->integer('status')->default(1)->change();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Hoàn nguyên về kiểu dữ liệu string nếu cần
            $table->string('status')->nullable()->change();
        });
    }
};
