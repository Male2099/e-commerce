<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use App\Http\Requests\StoreProductRatingRequest;
use App\Http\Requests\UpdateProductRatingRequest;
use Exception;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        try {
            $newData=$request->all();
            $newData['user_id']=$user->id;
            return response()->json(ProductRating::create($newData));
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response([
            'message'=>'This feature is not yet implemented'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productImage = ProductRating::findOrFail($id);
            $productImage->delete();
            return response([
                'success' => true,
                'message' => "The product rating has been successfully deleted.",
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the product rating. Please try again later.",
            ], 500);
        }
    }
}
