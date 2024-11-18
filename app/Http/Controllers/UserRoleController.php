<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    public function index()
    {
        return UserRole::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255'
        ]);

        $role = UserRole::create($request->all());
        return response()->json($role, 201);
    }

    public function show(UserRole $userRole)
    {
        return $userRole;
    }

    public function update(Request $request, UserRole $userRole)
    {
        $request->validate([
            'role' => 'required|string|max:255'
        ]);

        $userRole->update($request->all());
        return response()->json($userRole, 200);
    }

    public function destroy(UserRole $userRole)
    {
        $userRole->delete();
        return response()->json(null, 204);
    }
}