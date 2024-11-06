<?php

namespace Database\Factories;

use App\Models\DurationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DurationCategoryFactory extends Factory
{
    protected $model = DurationCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
