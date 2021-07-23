<?php

namespace App\Services;

use App\Models\History;
use App\Repositories\HistoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HistoryService implements HistoryRepository
{
    public function getAll(int $quantity = 12): LengthAwarePaginator
    {
        return History::with('user')->paginate($quantity);
    }
}
