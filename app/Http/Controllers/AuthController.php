<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('authentication.login');
    }

    public function signUp(){
        return view('authentication.sign-up');
    }
}
