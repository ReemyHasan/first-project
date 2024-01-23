<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function register(){
            return view("auth.register");
        }
        public function store(){
            $validated = request()->validate([
            "email"=> "required|email|unique:users,email",
            "password"=> "required|confirmed",
            "name"=> "required|min:3|max:40",
            ]);
            $user = User::create([
                "email"=> $validated["email"],
                "password"=> Hash::make($validated["password"]),
                "name"=> $validated["name"],
            ]);
            return redirect()->route("dashboard")->with("success","Account created successfully");
        }
        public function login(){
            return view("auth.login");
        }
        public function authenticate(){
            $validated = request()->validate([
            "email"=> "required|email",
            "password"=> "required"
            ]);
            if(auth()->attempt($validated)){
                request()->session()->regenerate();
            return redirect()->route("dashboard")->with("success","loged in");
        }
        return redirect()->route("login")->withErrors("your email may not found or wrong password");
    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route("dashboard")->with("success","loged out successfully");
    }
}
