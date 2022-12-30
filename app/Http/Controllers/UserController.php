<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('users', ['users' => $users]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function registered()
    {
        $registered = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('user-registered', ['registered' => $registered]);
    }
}
