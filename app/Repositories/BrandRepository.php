<?php

namespace App\Repositories;


interface BrandRepository
{
    /**
     * Returns an array with all registered brands.
     * @return mixed
     */
    public function getAll();
}
