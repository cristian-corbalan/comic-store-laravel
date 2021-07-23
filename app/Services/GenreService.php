<?php

namespace App\Services;

use App\Models\Genre;
use App\Repositories\GenreRepository;

class GenreService implements GenreRepository
{
    public function getAll(){
        return Genre::all();
    }
}
