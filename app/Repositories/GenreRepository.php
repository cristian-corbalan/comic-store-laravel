<?php

namespace App\Repositories;


interface GenreRepository
{
    /**
     * Returns all genres registered in the database.
     *
     * @return mixed
     */
    public function getAll();
}
