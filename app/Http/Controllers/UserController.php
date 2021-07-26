<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /** @var UserRepository */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
     public function __construct(UserRepository $userRepository){
         $this->userRepository = $userRepository;
     }

    /**
     * View with the list of all registered users on the website.
     *
     * @return Application|Factory|View
     */
    public function controlPanelList()
    {
        $users = $this->userRepository->getAll();

        return view('control-panel.users.list', compact('users'));
    }
}
