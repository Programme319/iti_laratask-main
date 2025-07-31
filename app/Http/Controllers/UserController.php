<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Protect all routes in this controller with Sanctum middleware.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Return a list of all users.
     */
    public function index()
    {
        return response()->json([
            'users' => User::all()
        ]);
    }

    /**
     * Show specific user by ID.
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }
}