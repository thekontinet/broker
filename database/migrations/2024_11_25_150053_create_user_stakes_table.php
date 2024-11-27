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
        Schema::create('stakes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('amount');
            $table->foreignId('pool_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('pools', function (Blueprint $table) {
            $table->integer('profit_percent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stakes');
        Schema::table('pools', function (Blueprint $table) {
            $table->dropColumn('profit_percent');
        });
    }
};
