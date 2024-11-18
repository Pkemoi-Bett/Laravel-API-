<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Create a new order item
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'meal_id' => 'required|exists:meals,id',
            'meal_order_id' => 'required|exists:meal_orders,id',
        ]);

        // Calculate total price
        $validatedData['total_price'] = $validatedData['quantity'] * $validatedData['unit_price'];

        $orderItem = OrderItem::create($validatedData);

        return response()->json([
            'message' => 'Order item added successfully!',
            'data' => $orderItem
        ], 201);
    }

    // Get all order items
    public function index()
    {
        $orderItems = OrderItem::with(['meal', 'mealOrder'])->get();

        return response()->json([
            'message' => 'Order items retrieved successfully!',
            'data' => $orderItems
        ]);
    }

    // Update an order item
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);

        $validatedData = $request->validate([
            'quantity' => 'sometimes|required|integer|min:1',
            'unit_price' => 'sometimes|required|numeric|min:0',
            'meal_id' => 'sometimes|required|exists:meals,id',
            'meal_order_id' => 'sometimes|required|exists:meal_orders,id',
        ]);

        // If quantity or unit price is updated, recalculate the total price
        if (isset($validatedData['quantity']) || isset($validatedData['unit_price'])) {
            $quantity = $validatedData['quantity'] ?? $orderItem->quantity;
            $unit_price = $validatedData['unit_price'] ?? $orderItem->unit_price;
            $validatedData['total_price'] = $quantity * $unit_price;
        }

        $orderItem->update($validatedData);

        return response()->json([
            'message' => 'Order item updated successfully!',
            'data' => $orderItem
        ]);
    }

    // Delete an order item
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json([
            'message' => 'Order item deleted successfully!'
        ]);
    }
}