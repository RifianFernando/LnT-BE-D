<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class regsiterController extends Controller
{
    public function registerView(){
        return view('auth_view_without_breeze.register');
    }

    public function register(RegisterRequest $request){
        // dd($request->all());
        $user = ([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // $user['password'] = bcrypt($user['password']);
        $user['password'] = Hash::make($user['password']);

        $user = User::create($user);
        $request->session()->flash('success', 'Register berhasil, silahkan login');


        return view('auth_view_without_breeze.login');
    }
}
