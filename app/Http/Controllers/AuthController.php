<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('authentication.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only(['password', 'email']);

        if(!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login-form')
                ->withInput()
                ->with('message', 'Las credenciales ingresadas no coinciden con nuestro registros.');
        }

        return redirect()
            ->route('home')
            ->with('message', 'Bienvenido')
            ->with('message_type', 'is-info');
    }

    public function signUpForm(){
        return view('authentication.sign-up');
    }
}
