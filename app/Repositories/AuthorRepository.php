<?php

namespace App\Repositories;


interface AuthorRepository
{
    /**
     * Returns an array with all registered authors.
     *
     * @return mixed
     */
    public function getAll();
}
