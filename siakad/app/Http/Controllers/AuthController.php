<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    public function loginujian()
    {
        return view('mastercbt.login');
    }

    public function postlogincbt(Request $request)
    {
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/dashcbt')->with('sukses', 'selamat datang');
        }
            return redirect('/logcbt')->with('gagal', 'anda gagal login');
    }

    public function logoutcbt()
    {
        Auth::logout();
        return redirect('/logcbt')->with('sukses', 'terima kasih anda telah logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard')->with('sukses', 'selamat datang');
        }
            return redirect('/login')->with('gagal', 'anda gagal login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('sukses', 'terima kasih anda telah logout');
    }
}
