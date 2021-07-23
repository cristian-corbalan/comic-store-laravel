<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

     public function __construct(UserRepository $userRepository){
         $this->userRepository = $userRepository;
     }

    public function controlPanelList()
    {
        $users = $this->userRepository->getAll();

        return view('control-panel.users.list', compact('users'));
    }
}
