<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(OrderDetail::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        try {
            $orderDetail = OrderDetail::find($id);
            if (!$orderDetail) {
                return response([
                    'success' => false,
                    'message' => "order detail not found.",
                ]);
            }
            $order = Order::find($orderDetail->id);
            if (!$orderDetail) {
                return response([
                    'success' => false,
                    'message' => "order not found.",
                ]);

                if ($order->user_id != $user->id) {
                    return response([
                        'success' => false,
                        'message' => "This action is unauthorized.",
                    ]);
                }
            }
            // $orderDetail = $orderDetail->delete();
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while fetching the order. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'success' => true,
            'order-detail' => $orderDetail
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)->where('status', 'busy')->first();
        if (!$order) {
            return response([
                'success' => false,
                'message' => "No current order found for this user.",

            ], 404);
        }

        try {
            $fields = $request->validate([
                'product_id' => 'required|integer',
                'subtotal' => 'sometimes|numeric',
                'quantity' => 'sometimes|integer',
            ]);
            if (!isset($fields['quantity'])) $fields['quantity'] = 1;
            $fields['order_id'] = $order->id;
            $fields['subtotal'] = $fields['quantity'] * Product::find($fields['product_id'])->price;

            $orderDetail = OrderDetail::create($fields);
            $orderDetail = OrderDetail::find($orderDetail->id);
            $total = $this->calTotalCost($order);
            $order->update(['total' => $total]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while adding the order detail. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'success' => true,
            'message' => 'New order detail added',
            'data' => $orderDetail
        ], 201);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        try {
            $orderDetail = OrderDetail::find($id);
            if (!$orderDetail) {
                return response([
                    'success' => false,
                    'message' => "order detail not found.",
                ]);
            }
            $order = Order::find($orderDetail->order_id);
            if (!$order) {
                return response([
                    'success' => false,
                    'message' => "order not found.",
                ]);

                if ($order->user_id != $user->id) {
                    return response([
                        'success' => false,
                        'message' => "This action is unauthorized.",
                    ]);
                }
            }
            $orderDetail->update($request->all());
            $subtotal = $orderDetail->quantity * Product::find($orderDetail->product_id)->price;
            $orderDetail->update(['subtotal' => $subtotal]);

            $total = $this->calTotalCost($order);
            $order->update(['total' => $total]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'success' => true,
            'message' => "The order has been successfully update.",
            'order-detail' => $orderDetail
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        try {
            $orderDetail = OrderDetail::find($id);
            if (!$orderDetail) {
                return response([
                    'success' => false,
                    'message' => "order detail not found.",
                ]);
            }
            $order = Order::find($orderDetail->order_id);

            if ($order->user_id != $user->id) {
                return response([
                    'success' => false,
                    'message' => "This action is unauthorized.",
                ]);
            }
            $orderDetail = $orderDetail->delete();
            $total = $this->calTotalCost($order);
            $order->update(['total' => $total]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'success' => true,
            'message' => "The order has been successfully deleted.",
        ]);
    }
    public function calTotalCost(Order $order)
    {
        $orderDetails = $order->orderDetails;
        $total = 0;
        foreach ($orderDetails as $odt) {
            $total += $odt->subtotal;
        }
        return $total;
    }
}
