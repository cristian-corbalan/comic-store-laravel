<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;

class AuthorService implements AuthorRepository
{
    /**
     * @inheritDoc
     */
    public function getAll(){
        return Author::all();
    }
}
