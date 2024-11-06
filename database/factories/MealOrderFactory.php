<?php

namespace Database\Factories;

use App\Models\MealOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealOrderFactory extends Factory
{
    protected $model = MealOrder::class;

    public function definition()
    {
        return [
            'customer_id' => \App\Models\User::factory(), // Assuming you have a User factory
            'order_status' => $this->faker->word,
            'date_ordered' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'order_number' => $this->faker->unique()->word,
        ];
    }
}
