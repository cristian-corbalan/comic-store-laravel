<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\BrandRepository;

class BrandService implements BrandRepository
{
    /**
     * @inheritDoc
     */
    public function getAll(){
        return Brand::all();
    }
}
