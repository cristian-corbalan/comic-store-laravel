<?php

namespace App\Repositories;


interface CharacterRepository
{
    /**
     * Returns an array with all registered characters.
     * @return mixed
     */
    public function getAll();
}
