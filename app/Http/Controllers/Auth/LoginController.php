<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Jika kredensial benar
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/index')->with('success', 'Berhasil Login!');;
        }

        // Jika kredensial salah, kirim pesan error menggunakan session
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
}

