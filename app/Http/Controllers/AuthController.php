<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return $user = User::create([
                'name' => $request->input(key : 'name'),
                'email' => $request->input(key : 'email'),
                'password' => Hash::make($request->input (key : 'password')),
            ]);
    }

    public function user()
    {
        return 'Authenticated User';
    }
    
}
