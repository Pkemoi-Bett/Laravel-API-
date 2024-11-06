<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_id',
        'available_date',
        'available_quantity',
        'unit_price', 
    ];
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
