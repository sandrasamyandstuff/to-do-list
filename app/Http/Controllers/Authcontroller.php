<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;




class Authcontroller extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($data);


        return redirect()->route('auth.login');
    }

    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);

           return redirect()->route('index');
        }

        return redirect()->back()->withErrors(
            "wrong email or password");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('register');
    }
}


