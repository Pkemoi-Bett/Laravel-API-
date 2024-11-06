<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealCategoryRequest;
use App\Http\Requests\UpdateMealCategoryRequest;
use App\Models\MealCategory;
use Illuminate\Http\Request;

class MealCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MealCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $mealCategory = MealCategory::create($request->all());

        return response()->json($mealCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MealCategory $mealCategory)
    {
        return response()->json($mealCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MealCategory $mealCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $mealCategory->update($request->all());

        return response()->json($mealCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealCategory $mealCategory)
    {
        $mealCategory->delete();

        return response()->json(null, 204);
    }
}


