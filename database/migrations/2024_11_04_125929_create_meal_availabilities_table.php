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
        Schema::create('meal_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->date('available_date');
            $table->integer('available_quantity');
            $table->integer('unit_price'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_availabilities');
    }
};
