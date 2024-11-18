<?php

// database/seeders/DatabaseSeeder.php
use App\Models\User;
use App\Models\UserRole;
use App\Models\Meal;
use App\Models\MealAvailability;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    public function run()
    {
        UserRole::create(['role' => 'Admin']);
        UserRole::create(['role' => 'User']);
        User::factory(10)->create(); // Create 10 users
    }



        // public function run()
        // {
        //     Meal::factory(10)->create(); // Seed some meals
        //     MealAvailability::factory(50)->create(); // Seed meal availability
        // }


    
}
