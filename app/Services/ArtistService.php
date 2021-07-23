<?php

namespace App\Services;

use App\Models\Artist;
use App\Repositories\ArtistRepository;

class ArtistService implements ArtistRepository
{
    public function getAll(){

        return Artist::all();
    }
}
