<?php

namespace App\Http\Controllers;

use App\Repositories\ComicRepository;

class HomeController extends Controller
{
    protected $comicRepository;

    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function home()
    {
        $comics = $this->comicRepository->getAll([], 5);

        return view('index', compact('comics'));
    }
}
