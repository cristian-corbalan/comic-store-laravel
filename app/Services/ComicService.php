<?php

namespace App\Services;

use App\Models\Comic;
use App\Repositories\ComicRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ComicService implements ComicRepository
{
    /**
     * @inheritDoc
     */
    public function create(array $data, array $genres = [], array $characters = [], array $authors = [], array $artists = []): Comic
    {
        $comic = Comic::create($data);

        $comic->genres()->attach($genres);
        $comic->characters()->attach($characters);
        $comic->authors()->attach($authors);
        $comic->artists()->attach($artists);

        return $comic;
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, int $pk, array $genres = [], array $characters = [], array $authors = [], array $artists = []): Comic
    {
        $comic = Comic::findOrFail($pk);

        $comic->update($data);

        $comic->genres()->sync($genres);
        $comic->characters()->sync($characters);
        $comic->authors()->sync($authors);
        $comic->artists()->sync($artists);

        return $comic;
    }

    /**
     * @inheritDoc
     */
    public function delete($pk)
    {
        $comic = Comic::findOrFail($pk);

        $comic->delete();

        return $comic;
    }

    public function getAll()
    {
        return Comic::all();
    }

    public function getAllWithTrashed()
    {
        return Comic::all()->withTrashed();
    }

    /**
     * @inheritDoc
     */
    public function getAllPaginated(array $searchParams = [], ?int $quantity = 12): LengthAwarePaginator
    {
        $comicQuery = Comic::with('cover', 'brand', 'genres');

        if (isset($searchParams['title'])) {
            $comicQuery->where('title', 'like', '%' . $searchParams['title'] . '%');
        }

        return $comicQuery->paginate($quantity)->withQueryString();
    }


    /**
     * @inheritDoc
     */
    public function getAllPaginatedWithTrashed(array $searchParams = [], ?int $quantity = 12): LengthAwarePaginator
    {
        $comicQuery = Comic::with('cover', 'brand')->withTrashed();

        if (isset($searchParams['title'])) {
            $comicQuery->where('title', 'like', '%' . $searchParams['title'] . '%');
        }

        return $comicQuery->paginate($quantity)->withQueryString();
    }

    /**
     * @inheritDoc
     */
    public function getByPk(int $pk): ?Comic
    {
        return Comic::findOrFail($pk);
    }

    /**
     * @inheritDoc
     */
    public function getByPkWithTrashed(int $pk)
    {
        return Comic::withTrashed()
            ->where('id', $pk)
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function restore(int $pk): void
    {
        Comic::withTrashed()->where('id', $pk)->restore();
    }
}
