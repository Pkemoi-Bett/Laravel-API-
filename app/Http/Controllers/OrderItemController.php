<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the order items.
     */
    public function index()
    {
        return OrderItem::with(['mealAvailability', 'unitOfMeasure'])->get();
    }

    /**
     * Store a newly created order item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'unit_price' => 'required|integer',
            'meal_availability_id' => 'required|exists:meal_availabilities,id',
            'unit_of_measure_id' => 'required|exists:unit_measures,id',
            'total_price' => 'required|integer',
            'status' => 'required|string',
        ]);

        $orderItem = OrderItem::create($request->all());

        return response()->json($orderItem, 201);
    }

    /**
     * Display the specified order item.
     */
    public function show(OrderItem $orderItem)
    {
        return $orderItem->load(['mealAvailability', 'unitOfMeasure']);
    }

    /**
     * Update the specified order item in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'unit_price' => 'required|integer',
            'meal_availability_id' => 'required|exists:meal_availabilities,id',
            'unit_of_measure_id' => 'required|exists:unit_measures,id',
            'total_price' => 'required|integer',
            'status' => 'required|string',
        ]);

        $orderItem->update($request->all());

        return response()->json($orderItem, 200);
    }

    /**
     * Remove the specified order item from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->json(null, 204);
    }
}
