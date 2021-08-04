<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Repositories\ComicRepository;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    public $comicRepository;

    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function all()
    {
        $comics = $this->comicRepository->getAll();

        return response()->json([
            'data' => Comic::all()
        ]);
    }
}
