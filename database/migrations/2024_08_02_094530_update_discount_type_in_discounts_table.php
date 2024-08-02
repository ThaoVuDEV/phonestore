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
        Schema::table('discounts', function (Blueprint $table) {
            // Sửa cột discount_type
            $table->enum('discount_type', ['fixed_amount', 'percentage'])
                  ->default('fixed_amount')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discounts', function (Blueprint $table) {
            // Quay lại kiểu dữ liệu cũ nếu cần
            // $table->string('discount_type')->default('fixed_amount')->change();
        });
    }
};
