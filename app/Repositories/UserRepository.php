<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepository
{

    /**
     * Create a new user in the database, with the "DefaultUser" role.
     *
     * @param $data
     * @return User
     */
    public function createDefaultUser($data): User;


    /**
     * Returns all registered users in the database.
     *
     * @return mixed
     */
    public function getAll();
}
