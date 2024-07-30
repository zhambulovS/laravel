<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginUser(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        }
        return redirect()->route('login')->with('error', 'Login or password incorrect');
    }

    public function signup()
    {
        return view('signup');
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request -> email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect() -> route('login');
    }
}
