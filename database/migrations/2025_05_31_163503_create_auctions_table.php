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
    $table->decimal('starting_bid', 10, 2);
    $table->decimal('current_bid', 10, 2)->nullable();
    $table->dateTime('end_time');
    $table->enum('status', ['active', 'closed'])->default('active');
    $table->foreignId('winner_id')->nullable();
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
