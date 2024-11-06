<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDurationCategoryRequest;
use App\Http\Requests\UpdateDurationCategoryRequest;
use App\Models\DurationCategory;
use Illuminate\Http\Request;

class DurationCategoryController extends Controller
{
    public function index()
    {
        return DurationCategory::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $durationCategory = DurationCategory::create($request->all());

        return response()->json($durationCategory, 201);
    }

    public function show($id)
    {
        return DurationCategory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time' => 'sometimes|date_format:H:i|after:start_time',
        ]);

        $durationCategory = DurationCategory::findOrFail($id);
        $durationCategory->update($request->all());

        return response()->json($durationCategory, 200);
    }

    public function destroy($id)
    {
        DurationCategory::destroy($id);
        return response()->json(null, 204);
    }
}

