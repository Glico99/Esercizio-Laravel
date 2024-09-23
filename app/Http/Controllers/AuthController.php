<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'email' => 'email',
            'name' => 'required|min:3|max:15',
            'password' => 'required|confirmed'
        ]);

        User::create($validated);
        auth()->attempt($validated);

        return redirect()->route('showDashboard')->with('success','User Created!');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email'=>'email',
            'password'=>'required'
        ]);

        if(auth()->attempt($validated)){
            return redirect()->route('showDashboard')->with('success','Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email'=>'Wrong email or password'
        ]);
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('showDashboard')->with('deleted','Logged out!');
    }
}
