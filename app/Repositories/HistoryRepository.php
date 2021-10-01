<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface HistoryRepository
{
    /**
     * Returns the actions performed by users, receives as a parameter the number of records to be displayed per page.
     *
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getAll(int $quantity): LengthAwarePaginator;
}
