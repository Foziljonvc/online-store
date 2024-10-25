<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        return response()->json([
            'success' => true,
            'data' => $user,
            'token' => $user->createToken($user->name)->plainTextToken,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(User::query()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);
        $user->update($request->only(['name', 'phone', 'role']));
        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'status'  => 'success',
        ]);
    }
}
