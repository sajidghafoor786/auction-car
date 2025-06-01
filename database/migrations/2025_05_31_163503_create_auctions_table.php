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
       Schema::create('auctions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('car_id');
    $table->foreignId('user_id')->nullable();
    $table->double('minimum_bid');
    $table->double('current_bid')->nullable()->default(0);
    $table->dateTime('start_date');
    $table->dateTime('end_date');
    $table->enum('status', ['active', 'closed'])->default('active');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
