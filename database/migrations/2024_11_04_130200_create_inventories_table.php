

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();  // Adds the id column as the primary key
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('inventory');
            $table->foreignId('category_id')->constrained('inventory_categories');
            $table->integer('unit_cost');
            $table->foreignId('unit_of_measure_id')->constrained('unit_measures');
            $table->decimal('price', 8, 2);
            $table->integer('reorder_level');
            $table->string('picture')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('availability_status');
            $table->date('expiry_date')->nullable();
            $table->string('sku_number')->nullable();
            $table->integer('quantity');
            $table->date('requisition_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};