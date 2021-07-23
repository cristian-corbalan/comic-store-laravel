<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;

class AuthorService implements AuthorRepository
{
    public function getAll(){
        return Author::all();
    }
}
