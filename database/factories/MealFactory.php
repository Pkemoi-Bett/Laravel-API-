<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\MealCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'meal_category_id' => MealCategory::inRandomOrder()->first()->id,
            'price_per_unit' => $this->faker->randomFloat(2, 5, 100),
            'picture' => $this->faker->imageUrl(),
            'picture_url' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(),
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
