<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = Category::query()->create([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'description' => $request->get('description'),
            'image' => $request->get('image')
        ]);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Category::query()->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::query()->find($id);

        $category->update([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'description' => $request->get('description'),
            'image' => $request->get('image')
        ]);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();

        return response()->json($category);
    }
}
