<?php

namespace App\Services;

use App\Models\Comic;
use App\Repositories\ComicRepository;
use Illuminate\Database\Eloquent\Collection;

class ComicService implements ComicRepository
{
    public function create(array $data, array $genres, array $characters, array $authors, array $artists): Comic
    {
        $comic = Comic::create($data);

        $comic->genres()->attach($genres);
        $comic->characters()->attach($characters);
        $comic->authors()->attach($authors);
        $comic->artists()->attach($artists);

        return $comic;
    }

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

    public function delete($pk): void
    {
        Comic::findOrFail($pk)->delete();
    }

    public function getAll(array $searchParams = [], int $quantity = 12): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $comicQuery = Comic::with('cover', 'brand');

        if (isset($searchParams['title'])) {
            $comicQuery->where('title', 'like', '%' . $searchParams['title'] . '%');
        }

        return $comicQuery->paginate($quantity)->withQueryString();
    }

    public function getByPk(int $pk): ?Comic
    {
        return Comic::findOrFail($pk);
    }
}
