<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(){
        return view('user.register');
    }

    public function store(){

        $validated = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7|confirmed'
        ]);

        $user = User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard')->with('success', "Account has been created successfully");

    }

}
