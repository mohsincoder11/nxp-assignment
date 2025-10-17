<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\ApiResponse;

class LoginController extends Controller
{
    use ApiResponse;

    /**
     * Handle API login request
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check credentials
        if (!$user || !Hash::check($request->password, $user->password)) {
        return $this->errorResponse('Invalid credentials',401);

        }

        // Create token
        $token = $user->createToken('api-token')->plainTextToken;

        $result=([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
        return $this->successResponse($result, 'Login successfull',200);

    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
