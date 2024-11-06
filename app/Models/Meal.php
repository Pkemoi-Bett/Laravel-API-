<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meal_category_id',
        'price_per_unit',
        'picture',
        'picture_url',
        'unit_of_measure_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(MealCategory::class, 'meal_category_id');
    }

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitMeasure::class, 'unit_of_measure_id');
    }
}
