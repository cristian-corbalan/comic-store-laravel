<?php

namespace App\Providers;

use App\Repositories\ArtistRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CharacterRepository;
use App\Repositories\ComicRepository;
use App\Repositories\GenreRepository;
use App\Repositories\HistoryRepository;
use App\Repositories\ImageRepository;
use App\Repositories\UserRepository;
use App\Services\ArtistService;
use App\Services\AuthorService;
use App\Services\BrandService;
use App\Services\CharacterService;
use App\Services\ComicService;
use App\Services\GenreService;
use App\Services\HistoryService;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public $bindings = [
        ArtistRepository::class => ArtistService::class,
        AuthorRepository::class => AuthorService::class,
        BrandRepository::class => BrandService::class,
        CharacterRepository::class => CharacterService::class,
        ComicRepository::class => ComicService::class,
        GenreRepository::class => GenreService::class,
        HistoryRepository::class => HistoryService::class,
        ImageRepository::class => ImageService::class,
        UserRepository::class => UserService::class,
    ];
}
