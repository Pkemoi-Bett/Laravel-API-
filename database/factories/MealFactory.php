<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\MealCategory;
use App\Models\UnitMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'meal_category_id' => MealCategory::factory(),
            'price_per_unit' => $this->faker->numberBetween(100, 1000),
            'picture' => null,
            'picture_url' => $this->faker->imageUrl(),
            'unit_of_measure_id' => UnitMeasure::factory(),
            'description' => $this->faker->sentence,
        ];
    }
}
