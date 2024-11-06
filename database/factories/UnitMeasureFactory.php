<?php

namespace Database\Factories;

use App\Models\UnitMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitMeasureFactory extends Factory
{
    protected $model = UnitMeasure::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Gram', 'Kilogram', 'Liter', 'Milliliter', 'Piece']),
        ];
    }
}
