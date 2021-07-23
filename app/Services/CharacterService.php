<?php

namespace App\Services;

use App\Models\Character;
use App\Repositories\CharacterRepository;

class CharacterService implements CharacterRepository
{
    public function getAll(){
        return Character::all();
    }
}
