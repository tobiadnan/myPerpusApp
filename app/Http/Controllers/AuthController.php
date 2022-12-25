<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        //cek apakah login valid
        if (Auth::attempt($credentials)) {
            //cek apakah user active
            if (Auth::user()->status != 'active') {
                Session::flash('status', 'Login failed');
                Session::flash('message', 'Your account is not active yet. Please contact administrator !!');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect()->intended('dashboard');
            } elseif (Auth::user()->role_id == 2) {
                return redirect()->intended('profile');
            }
        }
        Session::flash('status', 'Login failed');
        Session::flash('message', 'Username or password invalid!!');
        return redirect('/login');
    }
}
