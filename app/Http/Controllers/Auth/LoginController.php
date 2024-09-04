<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil, redirect ke halaman beranda atau dashboard
            return redirect()->intended('home');
        }

        // Login gagal, redirect kembali ke form login dengan pesan error
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
