<?php

namespace App\Repositories;

use App\Models\Comic;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    /**
     * Edit the data of a comic book already registered in the database.
     *
     * @param array $data
     * @param int $pk
     * @param array $genres
     * @param array $characters
     * @param array $authors
     * @param array $artists
     * @return Comic
     */
    public function update(array $data, int $pk, array $genres, array $characters, array $authors, array $artists): Comic;

    /**
     * Removes a comic from the database.
     *
     * @param $id
     */
    public function delete($id): void;

    /**
     *  Returns all the comics in the database, paginated and also with the requested search parameters.
     *
     * @param array $searchParams Receives as an attribute a string in the "tittle" position with the title of the comic book.
     * @param int $quantity
     * @return LengthAwarePaginator|Collection|Comic[]
     */
    public function getAll(array $searchParams, int $quantity): LengthAwarePaginator;

    /**
     * Search and return a comic in the database through its pk if it exists.
     *
     * @param int $pk
     * @return Comic|null
     */
    public function getByPk(int $pk):? Comic;
}
