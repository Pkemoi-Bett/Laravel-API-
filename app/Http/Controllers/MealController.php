<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Meal::with(['category', 'unitOfMeasure'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'meal_category_id' => 'required|exists:meal_categories,id',
            'price_per_unit' => 'required|integer',
            'unit_of_measure_id' => 'required|exists:unit_measures,id',
            'description' => 'nullable|string',
            'picture' => 'nullable|string',
            'picture_url' => 'nullable|url',
        ]);

        $meal = Meal::create($request->all());

        return response()->json($meal, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        return response()->json($meal->load(['category', 'unitOfMeasure']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'meal_category_id' => 'required|exists:meal_categories,id',
            'price_per_unit' => 'required|integer',
            'unit_of_measure_id' => 'required|exists:unit_measures,id',
            'description' => 'nullable|string',
            'picture' => 'nullable|string',
            'picture_url' => 'nullable|url',
        ]);

        $meal->update($request->all());

        return response()->json($meal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();

        return response()->json(null, 204);
    }
}

