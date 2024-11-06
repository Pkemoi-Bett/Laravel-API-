<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\MealAvailability;
use App\Models\UnitMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->numberBetween(100, 1000),
            'meal_availability_id' => MealAvailability::factory(),
            'unit_of_measure_id' => UnitMeasure::factory(),
            'total_price' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['unit_price'];
            },
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
        ];
    }
}
