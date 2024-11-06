<?php

namespace Database\Factories;

use App\Models\MealAvailability;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealAvailabilityFactory extends Factory
{
    protected $model = MealAvailability::class;

    public function definition()
    {
        return [
            'meal_id' => \App\Models\Meal::factory(), // Assumes you have a Meal factory
            'available_date' => $this->faker->date(),
            'available_quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->numberBetween(10, 100), // Generates a random price
        ];
    }
}
