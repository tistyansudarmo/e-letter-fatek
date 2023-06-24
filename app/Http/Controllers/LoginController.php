<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function LoginView() {
        return view('layouts.login.login');
    }


    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'alpha'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect('/login')->with('failed', 'Username / Password anda salah!');
        }
    }


    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
