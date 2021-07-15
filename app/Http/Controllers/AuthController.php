<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('authentication.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['password', 'email']);

        if (!auth()->attempt($credentials)) {
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

    public function signUpForm()
    {
        return view('authentication.sign-up');
    }

    public function signUp(SignUpRequest $request)
    {
        $credentials = $request->all();

        $credentials['password'] = Hash::make($credentials["password"]);

        $user = User::create($credentials);

        $user->assignRole('default');

        $credentials = $request->only(['password', 'email']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login-form')
                ->with('message', 'Hubo un error al iniciar la sesión, por favor inténtelo más tarde.');
        }

        return redirect()
            ->route('home')
            ->with('message', "Bienvenido $user->name $user->last_name")
            ->with('message_type', 'is-info');
    }

    public function logOut(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('auth.login-form');
    }
}
