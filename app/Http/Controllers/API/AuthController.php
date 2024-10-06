<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Http\Resources\AuthResource;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return response()->json($user, 201);
        return response()->json([
            'user' => new UserResource($user),
            'message' => 'Registration successful.'
        ], 201);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Email or password are invalid'], 401); // Unauthorized
        }

        // Get the authenticated user
        $user = Auth::user();

        // Create a new token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // return response()->json(['token' => $token]);
        // Return both user data and token
        return response()->json(new AuthResource((object) [
            'user' => $user,
            'token' => $token
        ]), 200);
    }

    public function logout(): JsonResponse
    {
        // Revoke all tokens for the authenticated user
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = Auth::user();

        // Check if user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // Not Found
        }

        // Check if current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 403); // Forbidden
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Password changed successfully'], 200);
    }
}