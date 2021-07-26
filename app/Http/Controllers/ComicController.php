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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /** @var ArtistRepository */
    protected $artistRepository;
    /** @var AuthorRepository */
    protected $authorRepository;
    /** @var BrandRepository */
    protected $brandRepository;
    /** @var CharacterRepository */
    protected $characterRepository;
    /** @var ComicRepository */
    protected $comicRepository;
    /** @var GenreRepository */
    protected $genreRepository;
    /** @var ImageRepository */
    protected $imageRepository;

    /**
     * ComicController constructor.
     * @param ArtistRepository $artistRepository
     * @param AuthorRepository $authorRepository
     * @param BrandRepository $brandRepository
     * @param CharacterRepository $characterRepository
     * @param ComicRepository $comicRepository
     * @param GenreRepository $genreRepository
     * @param ImageRepository $imageRepository
     */
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

    /**
     * View with the comics listing of the website.
     *
     * @return Application|Factory|View
     */
    public function websiteList()
    {
        $comics = $this->comicRepository->getAll([], 15);

        return view('website.pages.comics.list', compact('comics'));
    }

    /**
     * View with comic details.
     *
     * @param $comicId
     * @return Application|Factory|View
     */
    public function websiteDetails($comicId)
    {
        $comic = $this->comicRepository->getByPk($comicId);

        return view('website.pages.comics.details', compact('comic'));
    }

    /**
     * View with the comics listing of the control panel.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function controlPanelList(Request $request)
    {
        $formParams = [];

        if ($request->query('title'))
            $formParams['title'] = $request->query('title');

        $comics = $this->comicRepository->getAll($formParams, null);

        return view('control-panel.comics.list', compact('comics', 'formParams'));
    }

    /**
     * View with the form to create a new comic.
     *
     * @return Application|Factory|View
     */
    public function controlPanelFormNew()
    {
        $artists = $this->artistRepository->getAll();
        $authors = $this->authorRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $characters = $this->characterRepository->getAll();
        $genres = $this->genreRepository->getAll();

        return view('control-panel.comics.form', compact('brands', 'genres', 'characters', 'authors', 'artists'));
    }

    /**
     * View with the form to edit an existing comic.
     *
     * @param int $comicId
     * @return Application|Factory|View
     */
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

    /**
     * Create a new comic in the database.
     *
     * @param ComicInsertRequest $request
     * @return RedirectResponse
     */
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
            ->with('message_type', 'is-success');
    }

    /**
     * Edit an existing comic in the database.
     *
     * @param ComicUpdateRequest $request
     * @param int $comicId
     * @return RedirectResponse
     */
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
            ->with('message_type', 'is-success');
    }

    /**
     * Deletes a comic from the database.
     *
     * @param ComicDeleteRequest $request
     * @param int $comicId
     * @return RedirectResponse
     */
    public function delete(ComicDeleteRequest $request, int $comicId): RedirectResponse
    {
        $this->comicRepository->delete($comicId);

        return redirect()
            ->route('control-panel.comics.list')
            ->with('message', 'La comic se elimino con éxito.')
            ->with('message_type', 'is-success');
    }
}
