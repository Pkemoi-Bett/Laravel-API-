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
        Schema::table('payment_modes', function (Blueprint $table) {
            $table->string('name')->after('id'); // Add a name column after the id column
            $table->string('description')->nullable()->after('name'); // Add a nullable description column after the name column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_modes', function (Blueprint $table) {
            $table->dropColumn('name'); // Drop name column
            $table->dropColumn('description'); // Drop description column
        });
    }
};
