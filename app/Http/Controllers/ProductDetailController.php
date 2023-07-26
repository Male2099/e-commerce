<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Exception;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            return response()->json(ProductDetail::create($request->all()));
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while creating the productail. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param $id is the product id
     */
    public function update(Request $request, string $id)
    {
        try {
            $productDetail = ProductDetail::where('prodcut_id', $id)->first();
            if (!$productDetail) {
                return response([
                    'error' => 'product detail not found',
                ], 404);
            }

            $productDetail->update($request->all());
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while udating the productail. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
        return response([
            'suucess' => true,
            'message' => 'Porduct detail has succesfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $productDetail = ProductDetail::where('prodcut_id', $id)->first();
            if (!$productDetail) {
                return response([
                    'error' => 'product detail not found',
                ], 404);
            }

            $productDetail->delete();
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the productail. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
        return response([
            'suucess' => true,
            'message' => 'Porduct detail has succesfully deleting'
        ]);
    }
}
