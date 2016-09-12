<?php

namespace scp\Http\Controllers;

use Illuminate\Http\Request;

use scp\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials);
        } catch (JWTException $ex) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        if (!$token) {
            return response()->json(['error' => 'Credenciais Invalida'], 401);
        }

        return response()->json(compact('token'));
    }
}
