<?php

namespace App\Repositories;

use App\Models\Comic;
use Ramsey\Collection\Collection;

interface ComicRepository
{

    /**
     * Create a new comic
     *
     * @param array $data
     * @param array $genres
     * @param array $characters
     * @param array $authors
     * @param array $artists
     * @return Comic
     */
    public function create(array $data, array $genres, array $characters, array $authors, array $artists): Comic;

    public function update(array $data, int $pk, array $genres, array $characters, array $authors, array $artists): Comic;

    public function delete($id): void;

    /**
     * @param array $searchParams
     * @param int $quantity
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Collection|Comic[]
     */
    public function getAll(array $searchParams, int $quantity): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    /**
     * Search and return a comic book in the database through a pk
     *
     * @param int $pk
     * @return Comic|null
     */
    public function getByPk(int $pk):? Comic;
}
