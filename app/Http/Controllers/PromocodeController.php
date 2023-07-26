<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function activePromocode()
    {
        return response()->json(Promocode::where('expire_date', '>', now())->get());
    }
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return response()->json(Promocode::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            return response()->json(Promocode::create($request->all()));
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
        try {
            $productImage = Promocode::findOrFail($id);
            $productImage->update($request->all());
            return response([
                'success' => true,
                'message' => "The promcode has been successfully updated.",
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'prmocode not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while updated the order. Please try again later.",
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $productImage = Promocode::findOrFail($id);
            $productImage->delete();
            return response([
                'success' => true,
                'message' => "The promcode has been successfully deleted.",
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'prmocode not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
            ], 500);
        }
    }
}
