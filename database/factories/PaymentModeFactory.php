<?php

namespace Database\Factories;

use App\Models\PaymentMode;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentModeFactory extends Factory
{
    protected $model = PaymentMode::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
