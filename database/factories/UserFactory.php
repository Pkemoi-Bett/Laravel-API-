<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'PF_NO' => $this->faker->unique()->numerify('PF-####'),
            'role_id' => UserRole::inRandomOrder()->first()->id,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ];
    }
}
