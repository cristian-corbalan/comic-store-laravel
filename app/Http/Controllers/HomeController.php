<?php

namespace App\Http\Controllers;

use App\Repositories\ComicRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /** @var ComicRepository */
    protected $comicRepository;

    /**
     * HomeController constructor.
     * @param ComicRepository $comicRepository
     */
    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    /**
     * View with the home page of the web site.
     *
     * @return Application|Factory|View
     */
    public function home()
    {
        $comics = $this->comicRepository->getAllPaginated([], 5);

        return view('index', compact('comics'));
    }
}
