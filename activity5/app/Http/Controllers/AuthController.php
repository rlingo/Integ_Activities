<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // Show login form
        return view('auth.login');
    }

    public function create()
    {
        // Show registration form
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard after registration
        return redirect()->route('dashboard');
    }

    public function destroy()
    {
        // Logout the user
        Auth::logout();

        // Redirect to the home page after logout
        return redirect('/');
    }
}
