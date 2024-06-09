<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        if ($user && $password === $user->password) {
            Session::put('user', $user);
            return redirect()->route('course.introduction');
        } else {
            return back()->withErrors(['login' => '用户名或密码错误']);
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
