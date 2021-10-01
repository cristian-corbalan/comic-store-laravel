<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**@var UserRepository */
    protected $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * View with the login form.
     *
     * @return Application|Factory|View
     */
    public function loginForm()
    {
        return view('authentication.login');
    }

    /**
     * Log in the user and redirects the user to the home page of the website with a welcome message.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
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
            ->with('message_type', 'is-success');
    }

    /**
     * View with the registration form for a new user.
     *
     * @return Application|Factory|View
     */
    public function signUpForm()
    {
        return view('authentication.sign-up');
    }

    /**
     * Registers a new user, authenticates the user and redirects the user to the home page of the website.
     *
     * @param SignUpRequest $request
     * @return RedirectResponse
     */
    public function signUp(SignUpRequest $request): RedirectResponse
    {
        $credentials = $request->all();

        $credentials['password'] = Hash::make($credentials["password"]);

        $user = $this->userRepository->createDefaultUser($credentials);

        $credentials = $request->only(['password', 'email']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login-form')
                ->with('message', 'Hubo un error al iniciar la sesión, por favor inténtelo más tarde.');
        }

        return redirect()
            ->route('home')
            ->with('message', "Bienvenido $user->name $user->last_name")
            ->with('message_type', 'is-success');
    }

    /**
     * Log out the user.
     *
     * @return RedirectResponse
     */
    public function logOut(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('auth.login-form');
    }
}
