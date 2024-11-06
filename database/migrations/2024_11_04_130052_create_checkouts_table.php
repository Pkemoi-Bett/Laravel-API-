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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_mode_id')->constrained('payment_modes');
            $table->foreignId('meal_order_id')->constrained('meal_orders');
            $table->dateTime('date');
            $table->string('status');
            $table->integer('total_amount');
            $table->integer('vat');
            $table->string('transaction_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};