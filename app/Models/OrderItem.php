<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'order_items';

    // Specify the fillable fields
    protected $fillable = [
        'quantity',       // Quantity of the item
        'unit_price',     // Price per unit
        'total_price',    // Calculated total price
        'meal_id',        // Foreign key referencing meals table
        'meal_order_id'   // Foreign key referencing meal_order table
    ];

    // Relationships
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }

    public function mealOrder()
    {
        return $this->belongsTo(MealOrder::class, 'meal_order_id');
    }
}


