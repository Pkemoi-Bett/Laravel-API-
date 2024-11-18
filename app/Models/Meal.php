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
        'description', 
        'created_by'
    ];

    /**
     * Get the meal category associated with the meal.
     */
    public function category()
    {
        return $this->belongsTo(MealCategory::class, 'meal_category_id');
    }

    /**
     * Get the user that created the meal.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
