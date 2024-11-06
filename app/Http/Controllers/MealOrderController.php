<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealOrderRequest;
use App\Http\Requests\UpdateMealOrderRequest;
use App\Models\MealOrder;
use Illuminate\Http\Request;

class MealOrderController extends Controller
{
    public function index()
    {
        return MealOrder::all();
    }

    public function show($id)
    {
        return MealOrder::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'order_status' => 'required|string',
            'date_ordered' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'required|integer',
            'order_number' => 'required|string|unique:meal_orders,order_number',
        ]);

        $mealOrder = MealOrder::create($validatedData);
        return response()->json($mealOrder, 201);
    }

    public function update(Request $request, $id)
    {
        $mealOrder = MealOrder::findOrFail($id);

        $validatedData = $request->validate([
            'customer_id' => 'sometimes|exists:users,id',
            'order_status' => 'sometimes|string',
            'date_ordered' => 'sometimes|date',
            'status' => 'sometimes|string',
            'total_price' => 'sometimes|integer',
            'order_number' => 'sometimes|string|unique:meal_orders,order_number,' . $mealOrder->id,
        ]);

        $mealOrder->update($validatedData);
        return response()->json($mealOrder);
    }

    public function destroy($id)
    {
        $mealOrder = MealOrder::findOrFail($id);
        $mealOrder->delete();
        return response()->json(null, 204);
    }
}

