<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function websiteList()
    {
        $comics = Comic::all();

        return view('website.pages.comics.list', compact('comics'));
    }
}
