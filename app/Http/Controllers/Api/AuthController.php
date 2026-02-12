<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        if (!Auth::attempt($request->credentials())) {
        return response()->json([
            'message' => 'Identifiants incorrects'
        ], 401);
        }
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }
    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    public function register(AuthRegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); 
        return response()->json([
            'message' => 'Vous avez été deconnecté avec succès !'
        ]);
    }
}
