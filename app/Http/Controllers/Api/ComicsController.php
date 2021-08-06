<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComicDeleteRequest;
use App\Http\Requests\ComicInsertRequest;
use App\Http\Requests\ComicUpdateRequest;
use App\Repositories\ComicRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\JsonResponse;

class ComicsController extends Controller
{
    public $comicRepository;
    public $imageRepository;

    public function __construct(
        ComicRepository $comicRepository,
        ImageRepository $imageRepository
    )
    {
        $this->comicRepository = $comicRepository;
        $this->imageRepository = $imageRepository;
    }

    public function all(): JsonResponse
    {
        $comics = $this->comicRepository->getAll();

        return response()->json([
            'data' => $comics
        ]);
    }

    public function create(ComicInsertRequest $request): JsonResponse
    {
        $data = $request->only(['title', 'synopsis', 'number_pages', 'price', 'discount', 'stock', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);

        $image = $this->imageRepository->create($request->file('cover'), "Portada del comic " . $data['title']);

        $data['cover_img_id'] = $image->id;
        $data['price'] = $data["price"] * 100;

        $comic = $this->comicRepository->create(
            $data,
            $request->input('genres'),
            $request->input('characters'),
            $request->input('authors'),
            $request->input('artists'),
        );

        return response()->json([
            'code' => 0,
            'data' => $comic,
        ]);

    }

    public function delete(ComicDeleteRequest $request, $id): JsonResponse
    {
        $comic = $this->comicRepository->delete($id);
        $code = 0;


        if (!$comic->deleted_at)
            $code = 1;

        return response()->json([
            'code' => $code,
            'data' => $comic
        ]);

    }

    public function edit(ComicUpdateRequest $request, $id): JsonResponse
    {
        $data = $request->only(['title', 'synopsis', 'number_pages', 'price', 'discount', 'stock', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);

        $data['price'] = $data["price"] * 100;

        $imgData = [];

        if ($request->file('cover'))
            $imgData["src"] = $this->imageRepository->upload($request->file('cover'));

        $imgData["alt"] = 'Portada del comic ' . $data['title'];

        $comic = $this->comicRepository->getByPk($id);

        $this->imageRepository->update($imgData, $comic->cover->id);

        $comic = $this->comicRepository->update(
            $data,
            $id,
            $request->input('genres'),
            $request->input('characters'),
            $request->input('authors'),
            $request->input('artists'),
        );

        return response()->json([
            'code' => 0,
            'data' => $comic
        ]);
    }
}
