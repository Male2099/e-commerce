<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response([
                'success' => true,
                'message' => 'logged out'
            ], 200);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => "An error occurred while trying to logout. Please try again later.",
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string',
            ]);

            $user = User::create([
                'firstName' => $fields['firstName'],
                'lastName' => $fields['lastName'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        return response([
            'success' => true,
            'message' => 'You have successfully registered',
            $user
        ], 201);
    }

    public function login(Request $request)
    {
        try {
            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $fields['email'])->first();

            if (!$user || !Hash::check($fields['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'success' => false,
                    'message' => ['The provided inforamtion is incorrect'],
                ], 400);
            }

            if (!$user || $user->banned) {
                return response([
                    'success' => false,
                    'message' => 'you have beed banned!'
                ], 403);
            }
            // Check if a token for the user already exists
            // $tokenResult = $user->tokens->first();

            $token = $user->createToken('mytoken', ['*'], now()->addDays(15));


            return response([
                'success' => true,
                'message' => 'You successfully logged in',
                'token' => $token->plainTextToken,
                'expire' => $token->accessToken->expires_at,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ], 422);
        }
    }
    /**
     * get the current user via their token
     */
    public function getMe(Request $request)
    {
        try {
            return response()->json($request->user());
        } catch (Exception $e) {
            return response([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all the users
        $users = User::where('banned', false)->get();
        $usersData = array();
        foreach ($users as $user) {
            $orders = Order::where('user_id', $user->id)->get();
            $purchase = 0;
            foreach ($orders as $val) {
                $purchase += $val->cash_receive;
            }
            $userData = array(
                "id" => $user->id,
                "firstName" => $user->firstName,
                "lastName" => $user->lastName,
                "email" => $user->email,
                "purchase" => $purchase,
                "order" => count($orders),
                // "role" => "role_admin",
                "delivery_method" => $user->delivery_method,
                "remember_creditcard" => $user->remember_creaditcard,
                "remember_address" => "xxxxxxxxxxxxxxxxxxx",
                "address" => "xxxxxx",
                "role" => $user->role,
                "tel" => "xx xxx xxx xxx x x x",
                "banned" => $user->banned,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at,
            );
            array_push($usersData, $userData);
        }


        return response(
            $usersData
        );
    }

    /**
     * delete the current user via their token
     */
    public function deleteMe()
    {

        try {
            $currentUser_id = auth()->user()->id;

            $user = User::find($currentUser_id);
            $user->delete();
            return response([
                'success' => true,
                'message' => 'User has been remove'
            ], 200);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => 'fail to remove user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
        return response([
            $user
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        if (isset($request->email)) {
            return response([
                'success' => false,
                'message' => 'email is forbidden to update!'
            ], 403);
        }

        $user->update($request->all());
        return response([
            'success' => true,
            'user' => $user
        ]);
    }

    /**
     * ban the user email in the system
     */
    public function ban(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response([
                "success" => false,
                'message' => 'User not found'
            ], 404);
        }
        if ($user->banned) {
            return response([
                "success" => false,
                'message' => 'User have already been banned!',
                $user
            ], 400);
        }

        if ($user->role == 'role_admin') {
            return response([
                "success" => false,
                'message' => 'You cant ban admin!'
            ], 403);
        }

        // User::deleted($id);
        $user->update(['banned' => true]);
        return response([
            "success" => true,
            'message' => 'User banned'
        ]);
    }
    public function unban(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response([
                "success" => false,
                'message' => 'User not found'
            ], 404);
        }
        if (!$user->banned) {
            return response([
                "success" => false,
                'message' => 'User is not banned, so calling unban is unacceptable!'
            ], 400);
        }


        // User::deleted($id);
        $user->update(['banned' => false]);
        return response([
            "success" => true,
            'message' => 'User unbanned'
        ]);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response([
                "success" => false,
                'message' => 'User not found'
            ], 404);
        }

        if ($user->role == 'role_admin') {
            return response([
                "success" => false,
                'message' => 'You cant remove admin!'
            ], 403);
        }

        User::deleted($id);
        return response([
            "success" => false,
            'message' => 'User removed'
        ]);
    }
}
