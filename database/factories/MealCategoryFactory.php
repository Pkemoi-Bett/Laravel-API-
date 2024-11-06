<?php

namespace Database\Factories;

use App\Models\MealCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealCategoryFactory extends Factory
{
    protected $model = MealCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
