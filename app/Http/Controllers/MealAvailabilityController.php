<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealAvailabilityRequest;
use App\Http\Requests\UpdateMealAvailabilityRequest;
use App\Models\MealAvailability;
use Illuminate\Http\Request;

class MealAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MealAvailability::with('meal')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'meal_id' => 'required|exists:meals,id',
            'available_date' => 'required|date',
            'available_quantity' => 'required|integer',
            'unit_price' => 'required|integer', // Ensure unit_price is validated
        ]);

        // Create a new meal availability entry
        $mealAvailability = MealAvailability::create($validatedData);

        return response()->json($mealAvailability, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(MealAvailability $mealAvailability)
    {
        return response()->json($mealAvailability->load('meal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MealAvailability $mealAvailability)
    {
        $request->validate([
            'meal_id' => 'required|exists:meals,id',
            'available_date' => 'required|date',
            'available_quantity' => 'required|integer|min:1'
        ]);

        $mealAvailability->update($request->all());

        return response()->json($mealAvailability);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealAvailability $mealAvailability)
    {
        $mealAvailability->delete();

        return response()->json(null, 204);
    }
}

