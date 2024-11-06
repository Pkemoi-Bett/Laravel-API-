<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitMeasureRequest;
use App\Http\Requests\UpdateUnitMeasureRequest;
use App\Models\UnitMeasure;
use Illuminate\Http\Request;

class UnitMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(UnitMeasure::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $unitMeasure = UnitMeasure::create($request->all());

        return response()->json($unitMeasure, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitMeasure $unitMeasure)
    {
        return response()->json($unitMeasure);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitMeasure $unitMeasure)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $unitMeasure->update($request->all());

        return response()->json($unitMeasure);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitMeasure $unitMeasure)
    {
        $unitMeasure->delete();

        return response()->json(null, 204);
    }
}

