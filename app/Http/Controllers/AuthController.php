<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
     public function showRegister()
    {
        return view('auth.register');
    }
    
public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // default role
        ]);

        // Login user automatically
        auth()->login($user);

        // Redirect
        return redirect('admin.index')->with('success', 'Account created successfully!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }
}
