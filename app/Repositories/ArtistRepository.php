<?php

namespace App\Repositories;

use App\Models\Artist;

interface ArtistRepository
{
    /**
     * Returns an array with all registered artists.
     * @return Artist[]
     */
    public function getAll();
}
