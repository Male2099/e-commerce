<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
    }
    /**
     * Display a resource.
     */
    public function show(string $id)
    {
        $category=Category::find($id);
        if(!$category){
            return response([
                'success'=>false,
                'message'=> 'category not found'
            ], 404);
        }

        $category->products;

        return response([
            'success' => true,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|unique:categories,name',
                'imageUrl' => 'sometimes|string',
                'available' => 'sometimes|boolean',
                'desc' => 'sometimes|string'
            ]);
            $category = Category::create($fields);
            $category = Category::find($category->id);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        return response($category, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $category
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json([
                'success' => true,
                'message' =>'Category deleted'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }
    }
}
