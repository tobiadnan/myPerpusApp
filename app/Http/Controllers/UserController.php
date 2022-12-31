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

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-detail/' . $slug)->with('status', 'User Approved!');
        //return view('user-detail', ['user' => $user]);
    }

    public function banned($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User deleted successfully!');
    }
}
