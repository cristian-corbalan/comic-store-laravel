<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function websiteList()
    {
        $comics = Comic::with('cover', 'brand')->get();


        return view('website.pages.comics.list', compact('comics'));
    }

    public function websiteDetails(Comic $comic)
    {

        return view('website.pages.comics.details', compact('comic'));
    }
}
