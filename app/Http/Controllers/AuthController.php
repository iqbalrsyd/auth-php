<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Perbaikan penggunaan input tanpa named arguments
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return $user;
    }

    public function login(Request $request)
    {
        // Memastikan Auth diimpor dengan benar dan attempt berjalan tanpa error
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response([
                'message' => 'Invalid credentials!'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie ('jwt', $token, 60 * 24); 

        return response([
            'message' => 'Success'
        ]) -> withCookie($cookie); 
    }

    public function user()
    {
        return Auth::user();
    }
}
