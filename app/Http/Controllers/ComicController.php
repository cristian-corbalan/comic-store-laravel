<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicDeleteRequest;
use App\Http\Requests\ComicInsertRequest;
use App\Http\Requests\ComicUpdateRequest;
use App\Repositories\ArtistRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CharacterRepository;
use App\Repositories\ComicRepository;
use App\Repositories\GenreRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $artistRepository;
    protected $authorRepository;
    protected $brandRepository;
    protected $characterRepository;
    protected $comicRepository;
    protected $genreRepository;
    protected $imageRepository;

    public function __construct(
        ArtistRepository $artistRepository,
        AuthorRepository $authorRepository,
        BrandRepository $brandRepository,
        CharacterRepository $characterRepository,
        ComicRepository $comicRepository,
        GenreRepository $genreRepository,
        ImageRepository $imageRepository
    )
    {
        $this->artistRepository = $artistRepository;
        $this->authorRepository = $authorRepository;
        $this->brandRepository = $brandRepository;
        $this->characterRepository = $characterRepository;
        $this->comicRepository = $comicRepository;
        $this->genreRepository = $genreRepository;
        $this->imageRepository = $imageRepository;
    }

    public function websiteList()
    {
        $comics = $this->comicRepository->getAll([]);

        return view('website.pages.comics.list', compact('comics'));
    }

    public function websiteDetails($comicId)
    {
        $comic = $this->comicRepository->getByPk($comicId);

        return view('website.pages.comics.details', compact('comic'));
    }

    public function controlPanelList(Request $request)
    {
        $formParams = [];

        if ($request->query('title'))
            $formParams['title'] = $request->query('title');

        $comics = $this->comicRepository->getAll($formParams);

        return view('control-panel.comics.list', compact('comics', 'formParams'));
    }

    public function controlPanelFormNew()
    {
        $artists = $this->artistRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $characters = $this->characterRepository->getAll();
        $genres = $this->genreRepository->getAll();

        return view('control-panel.comics.form', compact('brands', 'genres', 'characters', 'authors', 'artists'));
    }

    public function controlPanelFormEdit(int $comicId)
    {
        $comic = $this->comicRepository->getByPk($comicId);

        $artists = $this->artistRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $characters = $this->characterRepository->getAll();
        $genres = $this->genreRepository->getAll();


        return view('control-panel.comics.form', compact('comic', 'brands', 'genres', 'characters', 'authors', 'artists'));
    }

    public function new(ComicInsertRequest $request): RedirectResponse
    {
        $data = $request->only(['title', 'synopsis', 'number_pages', 'price', 'discount', 'stock', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);

        $image = $this->imageRepository->create($request->file('cover'), "Portada del comic " . $data['title']);

        $data['cover_img_id'] = $image->id;
        $data['price'] = $data["price"] * 100;

        $this->comicRepository->create(
            $data,
            $request->input('genres'),
            $request->input('characters'),
            $request->input('authors'),
            $request->input('artists'),
        );

        return redirect()
            ->route('control-panel.comics.list')
            ->with('message', 'La comic se añadió con éxito.')
            ->with('message_type', 'is-info');
    }

    public function edit(ComicUpdateRequest $request, int $comicId): RedirectResponse
    {
        $data = $request->only(['title', 'synopsis', 'number_pages', 'price', 'discount', 'stock', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);

        $data['price'] = $data["price"] * 100;

        $imgData = [];

        if ($request->file('cover'))
            $imgData["src"] = $this->imageRepository->upload($request->file('cover'));

        $imgData["alt"] = 'Portada del comic ' . $data['title'];

        $comic = $this->comicRepository->getByPk($comicId);

        $this->imageRepository->update($imgData, $comic->cover->id);

        $this->comicRepository->update(
            $data,
            $comicId,
            $request->input('genres'),
            $request->input('characters'),
            $request->input('authors'),
            $request->input('artists'),
        );

        return redirect()
            ->route('control-panel.comics.list')
            ->with('message', 'La comic se añadió con éxito.')
            ->with('message_type', 'is-info');
    }

    public function delete(ComicDeleteRequest $request, $comicId): RedirectResponse
    {
        $this->comicRepository->delete($comicId);

        return redirect()
            ->route('control-panel.comics.list')
            ->with('message', 'La comic se elimino con éxito.')
            ->with('message_type', 'is-info');
    }
}
