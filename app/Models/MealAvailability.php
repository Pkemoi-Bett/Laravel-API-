<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAvailability extends Model
{
    use HasFactory;

    protected $table = 'meal_availability';

    protected $fillable = [
        'meal_id',
        'available_date',
        'available_quantity',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
