<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\MealAvailability;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealAvailabilityFactory extends Factory
{
    protected $model = MealAvailability::class;

    public function definition()
    {
        return [
            'meal_id' => Meal::inRandomOrder()->first()->id,
            'available_date' => $this->faker->date(),
            'available_quantity' => $this->faker->numberBetween(10, 100)
        ];
    }
}
