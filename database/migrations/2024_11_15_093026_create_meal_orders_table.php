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
        Schema::create('meal_orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['paid', 'not paid']);
            $table->string('phone_number');
            $table->timestamp('date_ordered');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_orders');
    }
};
