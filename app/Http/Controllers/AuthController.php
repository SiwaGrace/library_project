<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

        // Login user automaticall y
        Auth::login($user);

        // Redirect
        // Redirect based on role
if ($user->role === 'admin') {
    return redirect()->route('books.index')->with('success', 'Account created successfully!');
}

return redirect()->route('dashboard')->with('success', 'Account created successfully!');
        
    }

    public function showLogin()
    {
        return view('auth.login');
    }

 public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // prevent session fixation

             $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('books.index');
    }

    return redirect()->route('dashboard');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

     public function logout(Request $request)
    {
       Auth::logout();

       $request->session()->invalidate();
       $request->session()->regenerateToken();
return redirect()->route('welcome');
    }
}
