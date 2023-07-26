<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * store order
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $order = Order::where('user_id', $user->id)->where('status', 'busy')->first();
            if ($order) {
                return response([
                    'success' => false,
                    'message' => "Busy order has already existed, can not create new one",
                ]);
            }


            $fields = $request->validate([
                'status' => 'sometimes|string',
                'delivery_method' => 'sometimes|string',
                'total' => 'sometimes',
                'cash_receive' => 'sometimes|integer',
                'promocode' => 'sometimes|string',
            ]);

            if (isset($fields['status']) && $fields['status'] != 'busy') {
                return response([
                    'success' => false,
                    'message' => "Status can only be 'busy', without specufy, it's still 'busy'",
                ]);
            }

            $fields['user_id'] = $user->id;
            $order = Order::create($fields);
            $order = Order::find($order->id);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        return response(
            [
                'success' => true,
                'message' => 'new order added',
                'data' => $order
            ],
            201
        );
    }



    /**
     * @return: all orders that belong to authenthicated user
     * @user need to be the authorize to get their product
     */
    public function get_allOrdersBelongToUser()
    {
        $user = Auth::user(); // Get the authenticated user
        $orders = Order::where('user_id', $user->id);
        return response()->json($orders->get());
    }

    /**
     * @return: one order that belong  authenthicated user
     */
    public function get_anOrderBelongToUser(string $id)
    {
        try {
            $order = Order::findOrFail($id);
            try {
                $this->authorize('view', $order);
            } catch (Exception $e) {
                return response([
                    'success' => false,
                    'message' => "This action is unauthorized.",
                ]);
            }
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => 'order not found',
            ], 404);
        }

        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $odt) {
            $odt->product;
        }
        return response([
            $order,
        ]);
    }
    /**
     * @return: current order, status='busy' that belong  authenthicated user
     */
    public function get_currentOrderBelongToUser()
    {
        try {
            $order = Order::where('user_id', auth()->user()->id)->where('status', 'busy')->firstOrFail();
            $orderDetails = $order->orderDetails;
            $orderDetailsData = array();
            // $total = 0;
            foreach ($orderDetails as $od) {
                $od->product;
                array_push($orderDetailsData, $od);
            }
            return response($order);
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => 'order not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
    public function get_pendingOrderBelongToUser()
    {
        try {
            $orders = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

            if (!$orders) {
                return response(
                    [
                        'success' => false,
                        'message' => 'order not found',
                    ],
                    404
                );
            }
            $ordersData = array();
            foreach ($orders  as $order) {
                $orderDetails = $order->orderDetails;
                foreach ($orderDetails as $od) {
                    $od->product;
                }
                array_push($ordersData, $order);
            }
            return response($ordersData);
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => 'order not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while fetching the order. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function get_finishedOrderBelongToUser()
    {
        try {
            $orders = Order::where('user_id', auth()->user()->id)->where('status', 'finished')->get();

            if (!$orders) {
                return response(
                    [
                        'success' => false,
                        'message' => 'order not found',
                    ],
                    404
                );
            }
            $ordersData = array();
            foreach ($orders  as $order) {
                $orderDetails = $order->orderDetails;
                foreach ($orderDetails as $od) {
                    $od->product;
                }
                array_push($ordersData, $order);
            }
            return response($ordersData);
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => 'order not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while fetching the order. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @update: one order that belongs to authenticated user
     * This will also to use to change the order status when order complete or anything else
     */
    public function update_anOrderBelongToUser(Request $request)
    {
        try {
            $user = auth()->user();
            $order = Order::where('user_id', $user->id)->where('status', 'busy')->first();
            $this->authorize('update', $order);
            $order->update($request->all());
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => "order not found",
                'error' => $e->getMessage(),
            ], 404);
        } catch (AuthorizationException $e) {
            return response([
                'success' => false,
                'message' => "You are not authorized to perform this action.",
                'error' => $e->getMessage()
            ], 403);
        }
        if (isset($request->user_id)) {
            return response([
                'success' => false,
                'message' => "user is forbiden to change",
            ]);
        }

        $order->update($request->all());
        if ($order->status == 'pending') {
            $order->update(['order_date' => $order->updated_at]);
        }
        return response([
            'success' => true,
            'order' => $order,
            'message' => "The order has been successfully updated.",
        ]);
    }


    /**
     * @remove: one order that belong  authenthicated user
     */
    public function remove_anOrderBelongToUser(string $id)
    {
        try {
            $user = auth()->user();
            $order = Order::where('user_id', $user->id)->findOrFail($id);
            $this->authorize('delete', $order);
            $order->delete();
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => "Order not found",
            ], 404);
        } catch (AuthorizationException $e) {
            return response([
                'success' => false,
                'message' => "You are not authorized to perform this action.",
            ], 403);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while deleting the order. Please try again later.",
            ], 500);
        }

        return response([
            'success' => true,
            'message' => "The order has been successfully deleted.",
        ]);
    }

    /**
     * @Authorize-admin only
     * @Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->user;
        }
        return response()->json($orders);
    }
    public function exclude_busyOrder()
    {
        $orders = Order::whereNotIn('status', ['busy'])->get();
        foreach ($orders as $order) {
            $order->user;
        }
        return response()->json($orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Order::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $order = Order::find($id);
            $order = $order->update($request->all());
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'message' => "Order not found",
            ], 404);
        }
        return response([
            'success' => true,
            'order' => $order,
            'message' => "The order has been successfully updated.",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Order::find($id);
            if (!$order) {
                return response([
                    'success' => false,
                    'message' => "Order not found",
                ], 404);
            }
            $order->delete();
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
}
