<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreignId('color_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('capacity_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropForeign(['capacity_id']);
            $table->dropColumn(['color_id', 'capacity_id']);
        });
    }
};
