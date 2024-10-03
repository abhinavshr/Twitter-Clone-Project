<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function authentication(){


        $validated = request()->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if (auth()->attempt($validated)){
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', "Login Successfully!");
        }

        return redirect()->route('login')->withErrors([
            'email'=> "No matching user found with the provided email and password"
        ]);

    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', "Successfully Logout!");
    }
}
