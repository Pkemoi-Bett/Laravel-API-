<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentModeRequest;
use App\Http\Requests\UpdatePaymentModeRequest;
use App\Models\PaymentMode;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    public function index()
    {
        return PaymentMode::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $paymentMode = PaymentMode::create($request->all());

        return response()->json($paymentMode, 201);
    }

    public function show($id)
    {
        $paymentMode = PaymentMode::findOrFail($id);
        return response()->json($paymentMode);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $paymentMode = PaymentMode::findOrFail($id);
        $paymentMode->update($request->all());

        return response()->json($paymentMode);
    }

    public function destroy($id)
    {
        $paymentMode = PaymentMode::findOrFail($id);
        $paymentMode->delete();

        return response()->json(null, 204);
    }
}
