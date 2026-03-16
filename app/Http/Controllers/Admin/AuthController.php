<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        if(Auth::attempt($request->only('email','password')))
        {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ],401);
    }

}