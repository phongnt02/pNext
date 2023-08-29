<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $validate = $request->validate([
            'user_name' => ['required','unique:users','max:20'],
            'phone' => ['required','min:10'],
            'email' => ['required', 'email','unique:users'],
            'full_name' => ['required','max:256'],
            'password' => ['required','min:8'],
            'dob' => ['required'],
        ]);

        User::create([
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'full_name' => $request->full_name,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
        ]);

        $token = $request->user()->createToken()->plainTextToken;
        return response()->json([
            'user_name' => $request->user_name,
            'token' => $token
        ],200);
    }
}
