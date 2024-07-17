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
        Schema::create('special_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('special_price', 20, 2); // Trường giá đặc biệt
            $table->dateTime('start_date')->nullable(); // Ngày bắt đầu áp dụng giá đặc biệt, có thể null
            $table->dateTime('end_date')->nullable(); // Ngày kết thúc áp dụng giá đặc biệt, có thể null
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_prices');
    }
};
