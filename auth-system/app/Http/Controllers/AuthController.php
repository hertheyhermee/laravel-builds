<?php

namespace App\Http\Controllers;

use App\Auth\Services\RegisterUserService;
use App\Auth\Tokens\TokenIssuer;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(
        Request $request, 
        RegisterUserService $registerUserService,
        TokenIssuer $tokenIssuer
    ){
        $data =$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = $registerUserService->register(
            $data['name'],
            $data['email'],
            $data['password'],  
        );
        $token = $tokenIssuer->issueToken($user);
        return response()->json([
            'token' => $token,
        ], 201);
        
    }
}
