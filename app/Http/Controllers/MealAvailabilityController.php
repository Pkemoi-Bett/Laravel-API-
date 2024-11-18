<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealAvailabilityRequest;
use App\Http\Requests\UpdateMealAvailabilityRequest;
use App\Models\MealAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealAvailabilityController extends Controller
{
    /**
     * Display a listing of the meal availabilities.
     */
    public function index()
    {
        $availabilities = MealAvailability::with('meal')->get();
        return response()->json($availabilities);
    }

    /**
     * Store a newly created meal availability.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meal_id' => 'required|exists:meals,id',  // Validates that meal_id exists in meals table
            'available_date' => 'required|date',
            'available_quantity' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $availability = MealAvailability::create($request->all());
        return response()->json($availability, 201);
    }
    
    /**
     * Display the specified meal availability.
     */
    public function show($id)
    {
        $availability = MealAvailability::with('meal')->findOrFail($id);
        return response()->json($availability);
    }

    /**
     * Update the specified meal availability.
     */
    public function update(Request $request, $id)
    {
        $availability = MealAvailability::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'meal_id' => 'sometimes|exists:meals,id',
            'available_date' => 'sometimes|date',
            'available_quantity' => 'sometimes|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $availability->update($request->all());
        return response()->json($availability);
    }

    /**
     * Remove the specified meal availability.
     */
    public function destroy($id)
    {
        $availability = MealAvailability::findOrFail($id);
        $availability->delete();
        return response()->json(null, 204);
    }
}