<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {

        DB::beginTransaction();
        try {
            $user = User::create($request->all());

            $token = $user->createToken('api-token')->plainTextToken;

            DB::commit();
            return response()->json([
                'user_name' => $request->user_name,
                'token' => $token
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
