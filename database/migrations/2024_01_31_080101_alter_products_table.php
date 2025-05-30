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
        Schema::table('products', function (Blueprint $table) {
            // Add new columns
            $table->text('short_desc')->nullable()->after('description');
            $table->text('shipping_returns')->nullable()->after('short_desc');
            $table->text('related_product')->nullable()->after('shipping_returns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the added columns
            $table->dropColumn('short_desc');
            $table->dropColumn('shipping_returns');
            $table->dropColumn('related_product');
        });
    }
};
