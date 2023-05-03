<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // auth
    function tryLogin(Request $request) {
        if(!$request->filled('username','password')) {
            return response()->json(
                ['error' => 'Please provide us with all credentials'],422
            );
        }
        $credentials = $request->only('username','password');
        // using Auth Class to find user in row
        // attempt by default hashes the password and compares it with the hashed password inside db
        // returns true on success and false on failure
        $user = Auth::attempt($credentials);

        if(!$user) {
            return response()->json([
                'error' => 'User not found'
            ],422);
        } 
        return response()->json([
            'success' => 'User found in database!'
        ],200); 

    }
}
