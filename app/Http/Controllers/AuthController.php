<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth('web')->attempt($credential))
        {
            echo 'Anda Berhasil Login';
        } else {
            echo 'Password Atau Email Salah';
        }
    }

    public function viewLogin()
    {
        return view('auth.login');
    }
}
