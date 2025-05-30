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
        Schema::create('coupen_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->integer('max_uses')->nullable();
            $table->integer('max_uses_user')->nullable();
            $table->double('discount_amount', 10, 2);
            $table->double('min_amount', 10, 2);
            $table->enum('type', ['percent', 'fixed'])->default('fixed');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupen_code');
    }
};
