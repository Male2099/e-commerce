<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $product_id)
    {
        try {
            return response()->json(ProductImage::create($request->all()));
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
            ], 500);
        }
    }
    /**
     *list all image of the product
     */
    public function index()
    {
        return response()->json(ProductImage::all());
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productImage = Product::findOrFail($id);
            $productImage->delete();
            return response([
                'success' => true,
                'message' => "The product image has been successfully deleted.",
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
                'error'=>$e->getMessage()
            ], 500);
        }
    }
}
