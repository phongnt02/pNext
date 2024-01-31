<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginUserRequest;


class LoginController extends Controller
{
    public function login (LoginUserRequest $request) {
        if (Auth::attempt($request->all())) {
            $token = $request->user()->createToken('api-token')->plainTextToken;
            return response()->json([
                'user_name' => $request->user_name,
                'token' => $token
            ]);
        }
        return response()->json([
            'error' => 'Unauthorized'
        ], 200);
    }
    public function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
