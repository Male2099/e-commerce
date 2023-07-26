<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $productsData = array();

        foreach ($products as $product) {
            $ratings = $product->productRatings;
            $ratingCount = count($ratings);
            if ($ratingCount > 0) {
                $totalRating = 0;

                foreach ($ratings as $rating) {
                    $totalRating += $rating->rating_value;
                }

                $averageRating = $totalRating / $ratingCount;
                $product['rating_value'] = $averageRating;
            } else {
                $product['rating_value'] = 0;
            }
            $productData = array(
                'id' => $product->id,
                'name' => $product->name,
                'des' => $product->description,
                'price' => $product->price,
                'rating_value' => $product['rating_value'],
                'category_name' => $product->category->name,
                'category_id' => $product->category->id,
                'sale_count' => count(OrderDetail::where('product_id', $product->id)->get()),
                'available' => $product->available,
                'onSpecial_list' => $product->onSpecial_list,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'quantity' => $product->quantity,
                'discount' => $product->discount,
                'imageUrl' => $product->imageUrl,
                'desc' => $product->desc,
                'incrediant' => $product->incrediant,

            );
            array_push($productsData, $productData);
        }

        return response(
            $productsData
        );
    }
    public function discount()
    {
        $products = Product::where('discount', '>', 0)->get();
        $productsData = array();

        foreach ($products as $product) {
            $ratings = $product->productRatings;
            $ratingCount = count($ratings);
            if ($ratingCount > 0) {
                $totalRating = 0;

                foreach ($ratings as $rating) {
                    $totalRating += $rating->rating_value;
                }

                $averageRating = $totalRating / $ratingCount;
                $product['rating_value'] = $averageRating;
            } else {
                $product['rating_value'] = 0;
            }
            $productData = array(
                'id' => $product->id,
                'name' => $product->name,
                'des' => $product->description,
                'price' => $product->price,
                'rating_value' => $product['rating_value'],
                'category_name' => $product->category->name,
                'category_id' => $product->category->id,
                'sale_count' => count(OrderDetail::where('product_id', $product->id)->get()),
                'available' => $product->available,
                'onSpecial_list' => $product->onSpecial_list,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'quantity' => $product->quantity,
                'discount' => $product->discount,
                'imageUrl' => $product->imageUrl,
                'desc' => $product->desc,
                'special_desc' => $product->special_desc,
                'title' => $product->title,
                'incrediant' => $product->incrediant,
            );
            array_push($productsData, $productData);
        }

        return response(
            $productsData
        );
    }
    public function onSpecialList()
    {
        $products = Product::where('onSpecial_list', true)->get();
        $productsData = array();

        foreach ($products as $product) {
            $ratings = $product->productRatings;
            $ratingCount = count($ratings);
            if ($ratingCount > 0) {
                $totalRating = 0;

                foreach ($ratings as $rating) {
                    $totalRating += $rating->rating_value;
                }

                $averageRating = $totalRating / $ratingCount;
                $product['rating_value'] = $averageRating;
            } else {
                $product['rating_value'] = 0;
            }
            $productData = array(
                'id' => $product->id,
                'name' => $product->name,
                'des' => $product->description,
                'price' => $product->price,
                'rating_value' => $product['rating_value'],
                'category_name' => $product->category->name,
                'category_id' => $product->category->id,
                'sale_count' => count(OrderDetail::where('product_id', $product->id)->get()),
                'available' => $product->available,
                'onSpecial_list' => $product->onSpecial_list,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'quantity' => $product->quantity,
                'discount' => $product->discount,
                'imageUrl' => $product->imageUrl,
                'desc' => $product->desc,
                'title' => $product->title,
                'special_desc' => $product->special_desc,
                'incrediant' => $product->incrediant,

            );
            array_push($productsData, $productData);
        }

        return response(
            $productsData
        );
    }
    public function onWelcomeList()
    {
        $products = Product::where('onWelcomeList', true)->get();
        $productsData = array();

        foreach ($products as $product) {
            $ratings = $product->productRatings;
            $ratingCount = count($ratings);
            if ($ratingCount > 0) {
                $totalRating = 0;

                foreach ($ratings as $rating) {
                    $totalRating += $rating->rating_value;
                }

                $averageRating = $totalRating / $ratingCount;
                $product['rating_value'] = $averageRating;
            } else {
                $product['rating_value'] = 0;
            }
            $productData = array(
                'id' => $product->id,
                'name' => $product->name,
                'des' => $product->description,
                'price' => $product->price,
                'rating_value' => $product['rating_value'],
                'category_name' => $product->category->name,
                'category_id' => $product->category->id,
                'sale_count' => count(OrderDetail::where('product_id', $product->id)->get()),
                'available' => $product->available,
                'onSpecial_list' => $product->onSpecial_list,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'quantity' => $product->quantity,
                'discount' => $product->discount,
                'imageUrl' => $product->imageUrl,
                'desc' => $product->desc,
                'title' => $product->title,
                'special_desc' => $product->special_desc,

            );
            array_push($productsData, $productData);
        }

        return response(
            $productsData
        );
    }
    /**
     * Display a resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response([
                'success' => false,
                'message' => 'product not found'
            ], 404);
        }
        $product->imageUrls;
        $product->productDetails;
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'user_id' => 'sometimes',
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|unique:products,name',
                'price' => 'required|numeric',
                'onSpecial_list' => 'sometimes|boolean',
                'available' => 'sometimes|boolean',
                'discount' => 'sometimes|boolean',
                'quantity' => 'sometimes|integer',
                'desc' => 'sometimes|string',
                'title' => 'sometimes|string',
                'imageUrl' => 'sometimes|string'
            ]);
            $product = Product::create($fields);
            $product = Product::find($product->id);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        return response($product, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response([
                'success' => false,
                'message' => 'product not found'
            ], 404);
        }

        $product->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'product deleted'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'product not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
