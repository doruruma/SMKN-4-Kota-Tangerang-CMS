<?php

// Author : Andra Yuusha

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        // My Own Auth
        $this->middleware('AndraAuth');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect('/');
        } else {
            return redirect('/login')->with([
                'title' => 'error',
                'message' => 'Email atau Password tidak valid!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
