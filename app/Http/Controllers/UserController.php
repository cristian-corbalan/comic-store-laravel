<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function controlPanelList(){
        $users = User::with('profileImg')->get();

        return view('control-panel.users.list', compact('users'));
    }
}
