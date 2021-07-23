<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface HistoryRepository
{
    /**
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getAll(int $quantity = 12): LengthAwarePaginator;
}
