<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('auth_view_without_breeze.login');
    }

    public function login(Request $request)
    {
        // if(Auth::)
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors([
            'gagal' => 'login gagal karena tidak ada di database ataupun username dan password salah'
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
