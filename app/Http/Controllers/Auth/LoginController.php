<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login (Request $request) {
        $credentials = $request->validate([
            'user_name' => ['required','unique:users','max:20'],
            'password' => ['required','min:8'],
        ]);
        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken()->plainTextToken;
            return response()->json([
                'token' => $token
            ]);
        }
        return response()->json([
            'error' => 'Unauthorized'
        ], 401);
    }
    public function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
