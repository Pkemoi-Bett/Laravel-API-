<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'unit_price',
        'meal_availability_id',
        'unit_of_measure_id',
        'total_price',
        'status',
    ];

    public function mealAvailability()
    {
        return $this->belongsTo(MealAvailability::class);
    }

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitMeasure::class);
    }
}

