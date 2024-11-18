<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model name
    protected $table = 'meal_categories';

    // Specify which fields are fillable (mass assignable)
    protected $fillable = [
        'name', 'start_time', 'end_time'
    ];
}