<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepository
{
    public function createDefaultUser($data): User;

    public function getAll();
}
