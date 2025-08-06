<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['title' => ' Login']);
    }

    // public function login(Request $request)
    // {
    //     // validasi input
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);

    //     if (Auth::guard('pengguna')->attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('pengguna');
    //     }

    //     return back()->with('LoginError', 'Login Failed');
    // }

    public function daftar()
    {
        return view('daftar', ['title' => ' Daftar']);
    }
}
