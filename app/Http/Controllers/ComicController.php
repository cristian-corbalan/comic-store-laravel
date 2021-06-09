<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicInsertRequest;
use App\Models\Artist;
use App\Models\Author;
use App\Models\Brand;
use App\Models\Character;
use App\Models\Comic;
use App\Models\Genre;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;

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

    public function controlPanelList()
    {
        $comics = Comic::with('cover', 'brand')->get();


        return view('control-panel.comics.list', compact('comics'));
    }

    public function controlPanelForm()
    {
        $brands = Brand::all();
        $genres = Genre::all();
        $characters = Character::all();
        $authors = Author::all();
        $artists = Artist::all();


        return view('control-panel.comics.form', compact('brands', 'genres', 'characters', 'authors', 'artists'));
    }

    public function new(ComicInsertRequest $request): RedirectResponse
    {
        $data = $request->only(['title', 'synopsis', 'number_pages', 'price', 'discount', 'stock', 'publication_date', 'brand_id', 'genres', 'characters', 'authors', 'artists']);

        // Upload image
        $cover = $request->file('cover');

        $path = $cover->store('img/comics', 'public');

        $path = substr($path, 4);

        $imgData = [
            'src' => $path,
            'alt' => 'Portada del comic ' . $data['title'],
        ];

        $image = Image::create($imgData);

        $data['cover_img_id'] = $image->id;
        $data['price'] = $data["price"] * 100;

        $comic = Comic::create($data);

        $comic->genres()->attach($request->input('genres'));
        $comic->characters()->attach($request->input('characters'));
        $comic->authors()->attach($request->input('authors'));
        $comic->artists()->attach($request->input('artists'));

        return redirect()
            ->route('control-panel.comics.list')
            ->with('message', 'La comic se añadió con éxito.')
            ->with('message_type', 'is-info');
    }
}
