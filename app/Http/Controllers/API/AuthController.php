<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        // ✅ Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // ✅ Create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // ✅ Response (safe)
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'code' => 201
        ], 201);
    }
    public function login(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ✅ Find user
        $user = User::where('email', $validated['email'])->first();

        // ❌ Invalid credentials
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // ✅ Create Token
        $token = $user->createToken('auth_token')->plainTextToken;

        // ✅ Response
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
