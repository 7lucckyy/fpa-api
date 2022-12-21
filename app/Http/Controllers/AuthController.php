<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //Register User
    public function register(Request $request){
        $userData = $request->validate([
            'name' => 'required| string',
            'email' => 'required | email',
            'password' => 'required',
        ]);

        $User = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password'])
        ]);

        $token = $User->createToken('futureprowess1199')->plainTextToken;

        $response = [
            'user' => $User,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logout Success'
        ];
    }
}
