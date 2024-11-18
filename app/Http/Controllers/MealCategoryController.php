<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealCategoryRequest;
use App\Http\Requests\UpdateMealCategoryRequest;
use App\Models\MealCategory;
use Illuminate\Http\Request;

class MealCategoryController extends Controller
{
    public function index()
    {
        // Retrieve all meal categories
        return MealCategory::all();
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time', // Ensure end time is after start time
        ]);

        // Create new meal category
        $mealCategory = MealCategory::create($request->all());
        return response()->json($mealCategory, 201); // Return created meal category with 201 status
    }

    public function show(MealCategory $mealCategory)
    {
        // Show a specific meal category
        return $mealCategory;
    }

    public function update(Request $request, MealCategory $mealCategory)
    {
        // Validate input data
        $request->validate([
            'name' => 'nullable|string|max:255',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
        ]);

        // Update the meal category
        $mealCategory->update($request->only(['name', 'start_time', 'end_time']));
        return response()->json($mealCategory, 200); // Return updated meal category
    }

    public function destroy(MealCategory $mealCategory)
    {
        // Delete the meal category
        $mealCategory->delete();
        return response()->json(null, 204); // Return 204 status for successful deletion
    }
}

