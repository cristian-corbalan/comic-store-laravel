<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService implements UserRepository
{
    public function createDefaultUser($data): User
    {
        $user = User::create($data);

        $user->assignRole('default');

        return $user;
    }

    public function getAll(){
        return User::with('profileImg')->get();
    }
}
