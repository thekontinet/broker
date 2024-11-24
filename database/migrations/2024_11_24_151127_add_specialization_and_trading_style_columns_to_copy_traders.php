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
        Schema::table('copy_traders', function (Blueprint $table) {
            $table->string('specialization');
            $table->string('trading_style');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_traders', function (Blueprint $table) {
            $table->dropColumn(['specialization', 'trading_style']);
        });
    }
};
