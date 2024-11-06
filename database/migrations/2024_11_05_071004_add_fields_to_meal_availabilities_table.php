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
        Schema::table('meal_availabilities', function (Blueprint $table) {
           // $table->date('available_date')->after('meal_id'); 
           // $table->integer('available_quantity')->after('available_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meal_availabilities', function (Blueprint $table) {
            $table->dropColumn('available_date');
            $table->dropColumn('available_quantity');
        });
    }
};
