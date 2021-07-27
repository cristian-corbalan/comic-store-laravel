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
    public function create(array $data, array $genres, array $characters, array $authors, array $artists): Comic
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
    public function update(array $data, int $pk, array $genres, array $characters, array $authors, array $artists): Comic
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
    public function delete($pk): void
    {
        Comic::findOrFail($pk)->delete();
    }

    /**
     * @inheritDoc
     */
    public function getAll(array $searchParams = [], ?int $quantity = 12): LengthAwarePaginator
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
    public function getAllWithTrashed(array $searchParams = [], ?int $quantity = 12): LengthAwarePaginator
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
    public function restore(int $pk): void
    {
        Comic::withTrashed()->where('id', $pk)->restore();
    }
}
