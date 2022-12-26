<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
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

                //mencegah client inactive untuk tidak ogin 
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerate();

                Session::flash('status', 'Failed');
                Session::flash('message', 'Your account is not active yet. Please contact Administrator !!');
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

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|max:15',
            'address' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        //dd($request->all());

        Session::flash('status', 'Success');
        Session::flash('message', 'You have register. Just wait for Administator to validate your data !!');
        return redirect('register');
    }
}
