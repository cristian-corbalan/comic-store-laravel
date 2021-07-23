<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\BrandRepository;

class BrandService implements BrandRepository
{
    public function getAll(){
        return Brand::all();
    }
}
