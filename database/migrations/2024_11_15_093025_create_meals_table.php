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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Meal name
            $table->foreignId('meal_category_id')->constrained('meal_categories'); // Foreign key to meal_categories table
            $table->decimal('price_per_unit', 8, 2);  // Price of meal
            $table->string('picture');  // Picture file name or path
            $table->string('picture_url');  // URL to the picture
            $table->text('description');  // Description of the meal
            $table->foreignId('created_by')->constrained('users'); // Foreign key to users table (meal creator)
            $table->timestamps();  // Created at and Updated at timestamps
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
