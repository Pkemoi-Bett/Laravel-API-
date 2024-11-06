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
        Schema::create('meal_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users');
            $table->string('order_status');
            $table->dateTime('date_ordered');
            $table->string('status');
            $table->integer('total_price');
            $table->string('order_number');
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