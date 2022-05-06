<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request) {

        // The fields sent into the form. required fields that are strings, as well as unique email field on the users table, and a fields that requires confirming. So `password` needs to also follow with `password_confirmation`
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        // Create a user in the db with the fields from above if valid. Notice bcrypt on password
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // Create a token for the user. 'myapptoken' can be anything, maybe something secure and from .env?
        $token = $user->createToken('myapptoken')->plainTextToken;

        // Create a response object with new user and token
        $response = [
            'user' => $user,
            'token' => $token
        ];

        // Return response with a 201 status code. Just return $response if no status code required.
        return response($response, 201);
    }

    public function login(Request $request) {

        // The fields sent into the form. required fields that are strings, as well as unique email field on the users table, and a fields that requires confirming. So `password` needs to also follow with `password_confirmation`
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        // if email is good, and password is good, create a token as per register
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'User logged out'
        ];
    }
}
