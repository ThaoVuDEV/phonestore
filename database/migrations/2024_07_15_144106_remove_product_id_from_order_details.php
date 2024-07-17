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
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(['product_id']); // Xóa khóa ngoại trước
            $table->dropColumn('product_id');    // Sau đó xóa cột
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        });
    }
};