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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('meal_category_id')->constrained('meal_categories');
            $table->integer('price_per_unit');
            $table->string('picture')->nullable();
            $table->string('picture_url')->nullable();
            $table->foreignId('unit_of_measure_id')->constrained('unit_measures');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};