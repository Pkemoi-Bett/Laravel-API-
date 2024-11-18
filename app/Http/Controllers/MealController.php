<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    /**
     * Display a listing of the meals.
     */
    public function index()
    {
        $meals = Meal::with(['category', 'creator'])->get();
        return response()->json($meals);
    }

    /**
     * Store a newly created meal in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'meal_category_id' => 'required|exists:meal_categories,id',
            'price_per_unit' => 'required|numeric',
            'picture' => 'required|string',
            'picture_url' => 'required|url',
            'description' => 'required|string',
            'created_by' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $meal = Meal::create($request->all());
        return response()->json($meal, 201);
    }

    /**
     * Display the specified meal.
     */
    public function show($id)
    {
        $meal = Meal::with(['category', 'creator'])->findOrFail($id);
        return response()->json($meal);
    }

    /**
     * Update the specified meal in the database.
     */
    public function update(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'meal_category_id' => 'sometimes|exists:meal_categories,id',
            'price_per_unit' => 'sometimes|numeric',
            'picture' => 'sometimes|string',
            'picture_url' => 'sometimes|url',
            'description' => 'sometimes|string',
            'created_by' => 'sometimes|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $meal->update($request->all());
        return response()->json($meal);
    }

    /**
     * Remove the specified meal from the database.
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();
        return response()->json(null, 204);
    }
}