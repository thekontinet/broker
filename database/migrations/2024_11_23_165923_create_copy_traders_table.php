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
        Schema::create('copy_traders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('trading_day');
            $table->integer('ROI');
            $table->integer('average_PnL');
            $table->integer('min_copy_amount');
            $table->integer('max_copiers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copy_traders');
    }
};
