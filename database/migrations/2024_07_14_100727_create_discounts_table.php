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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Trường mã code, duy nhất
            $table->text('description')->nullable(); // Trường mô tả, có thể null
            $table->enum('discount_type', ['fixed_amount', 'percentage'])->default('fixed_amount'); // Trường loại giảm giá, giá trị mặc định là 'fixed_amount'  percentage là phần trăm
            $table->decimal('value', 20, 2); // Trường giá trị giảm giá
            $table->dateTime('start_date')->nullable(); // Trường ngày bắt đầu, có thể null
            $table->dateTime('end_date')->nullable(); // Trường ngày kết thúc, có thể null
            $table->integer('usage_limit')->nullable(); // Trường giới hạn số lần sử dụng, có thể null
            $table->integer('used_count')->default(0); // Trường số lần đã sử dụng, mặc định là 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
