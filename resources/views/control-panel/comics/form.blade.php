@php
    if(isset($comic)){
    $values = [
            'title' => old('title') ?? $comic->title,
            'number_pages' => old('number_pages') ?? $comic->number_pages,
            'synopsis' => old('synopsis') ?? $comic->synopsis,
            'price' => old('price') ?? $comic->price / 100,
            'discount' => old('discount') ?? $comic->discount,
            'stock' => old('stock') ?? $comic->stock,
            'publication_date' => old('publication_date') ?? $comic->publication_date,
            'brand_id' => old('brand_id') ?? $comic->brand_id,
            'genres' => old('genres') ?? $comic->genres->pluck('id')->toArray(),
            'characters' => old('characters') ?? $comic->characters->pluck('id')->toArray(),
            'authors' => old('authors') ?? $comic->authors->pluck('id')->toArray(),
            'artists' => old('artists') ?? $comic->artists->pluck('id')->toArray(),
        ];
}else{
    $values = [
            'title' => old('title') ?? null,
            'number_pages' => old('number_pages') ?? null,
            'synopsis' => old('synopsis') ?? null,
            'price' => old('price') ?? 1,
            'discount' => old('discount') ?? 0,
            'stock' => old('stock') ?? 1,
            'publication_date' => old('publication_date') ?? null,
            'brand_id' => old('brand_id') ?? null,
            'genres' => old('genres') ?? [],
            'characters' => old('characters') ?? [],
            'authors' => old('authors') ?? [],
            'artists' => old('artists') ?? [],
        ];

}

@endphp

@extends('layouts.control-panel')

@section('sectionTitle', 'Comics')

@section('contentClass', 'comic-form')

@section('content')
    <h3>Añadir un comic</h3>

    @if(!isset($comic))
        <form action="{{route('comics.new')}}" method="POST" enctype="multipart/form-data">
            @else
                <form action="{{route('comics.edit', ['comic' => $comic->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @endif
                    <p>Todos los campos con <span class="has-text-danger">*</span> son obligatorios</p>


                    @csrf

                    <div class="field">
                        <label class="label" for="title-input">Titulo <span class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="text"
                                id="title-input"
                                name="title"
                                value="{{$values["title"]}}"
                                @error('title') aria-describedby="title-error" @enderror/>
                        </div>

                        @error('title')
                        <div class="notification is-danger" id="title-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="number-page-input">Cantidad de paginas</label>
                        <div class="control">
                            <input
                                class="input"
                                type="number"
                                id="number-page-input"
                                name="number_pages"
                                value="{{$values["number_pages"]}}"
                                @error('number_pages') aria-describedby="number_pages-error" @enderror/>
                        </div>

                        @error('number_pages')
                        <div class="notification is-danger" id="number_pages-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="synopsis-input">Sinopsis <span
                                class="has-text-danger">*</span></label>
                        <div class="control">
                    <textarea
                        class="textarea"
                        id="synopsis-input"
                        name="synopsis"
                        @error('synopsis') aria-describedby="synopsis-error" @enderror>{{$values["synopsis"]}}</textarea>
                        </div>

                        @error('synopsis')
                        <div class="notification is-danger" id="synopsis-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="price-input">Precio <span class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="number"
                                id="price-input"
                                name="price"
                                value="{{$values["price"]}}"
                                @error('price') aria-describedby="price-error" @enderror/>
                        </div>

                        @error('price')
                        <div class="notification is-danger" id="price-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="discount-input">Descuento <span
                                class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="number"
                                id="discount-input"
                                name="discount"
                                value="{{$values["discount"]}}"
                                @error('discount') aria-describedby="discount-error" @enderror/>
                        </div>

                        @error('discount')
                        <div class="notification is-danger" id="discount-error">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label" for="stock-input">Stock <span class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="number"
                                id="stock-input"
                                name="stock"
                                value="{{$values["stock"]}}"
                                @error('stock') aria-describedby="stock-error" @enderror/>
                        </div>

                        @error('stock')
                        <div class="notification is-danger" id="stock-error">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="field">
                        <label class="label" for="publication-date-input">Fecha de publicación <span
                                class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="date"
                                id="publication-date-input"
                                name="publication_date"
                                value="{{$values["publication_date"]}}"
                                @error('publication_date') aria-describedby="publication_date-error" @enderror/>
                        </div>

                        @error('publication_date')
                        <div class="notification is-danger" id="publication_date-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label" for="cover-input">Portada del comic <span class="has-text-danger">*</span></label>
                        <div class="control">
                            <input
                                class="input"
                                type="file"
                                id="cover-input"
                                name="cover"
                                aria-describedby="cover-help @error('cover') cover-error @enderror"/>
                        </div>

                        @error('cover')
                        <div class="notification is-danger" id="cover-error">{{$message}}</div>
                        @enderror
                        <p class="help" id="cover-help">La imagen debe ser JPG.</p>
                    </div>

                    <div class="field">
                        <label class="label" for="brand-select">Seleccione la marca <span
                                class="has-text-danger">*</span></label>

                        <div class="control">
                            <div class="select">
                                <select
                                    name="brand_id" id="brand-select"
                                    @error('brand_id') aria-describedby="brand-error" @enderror>

                                    @foreach($brands as $brand)
                                        <option
                                            value="{{$brand->id}}"
                                            @if($values["brand_id"] == $brand->id) selected @endif>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @error('brand_id')
                            <div class="notification is-danger" id="brand-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <div class="select is-multiple">
                            <label class="label" for="genres-select">Seleccione los géneros <span
                                    class="has-text-danger">*</span></label>

                            <select
                                name="genres[]" id="genres-select" multiple size="4"
                                @error('genres') aria-describedby="genres-error" @enderror>

                                @foreach($genres as $genre)
                                    <option
                                        value="{{$genre->id}}"
                                        @if(in_array($genre->id, $values["genres"])) selected @endif>
                                        {{$genre->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('genres')
                        <div class="notification is-danger" id="genres-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="select is-multiple">
                            <label class="label" for="characters-select">Seleccione los personajes <span
                                    class="has-text-danger">*</span></label>

                            <select
                                name="characters[]" id="characters-select" multiple size="4"
                                @error('characters') aria-describedby="characters-error" @enderror>

                                @foreach($characters as $character)
                                    <option
                                        value="{{$character->id}}"
                                        @if(in_array($character->id, $values["characters"])) selected @endif>
                                        {{$character->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('characters')
                        <div class="notification is-danger" id="characters-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="select is-multiple">
                            <label class="label" for="authors-select">Seleccione los escritores <span
                                    class="has-text-danger">*</span></label>

                            <select
                                name="authors[]" id="authors-select" multiple size="4"
                                @error('authors') aria-describedby="authors-error" @enderror>

                                @foreach($authors as $author)
                                    <option
                                        value="{{$author->id}}"
                                        @if(in_array($author->id, $values["authors"])) selected @endif>
                                        {{$author->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('authors')
                        <div class="notification is-danger" id="authors-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="select is-multiple">
                            <label class="label" for="artists-select">Seleccione los artistas <span
                                    class="has-text-danger">*</span></label>

                            <select
                                name="artists[]" id="artists-select" multiple size="4"
                                @error('artists') aria-describedby="artists-error" @enderror>

                                @foreach($artists as $artist)
                                    <option
                                        value="{{$artist->id}}"
                                        @if(in_array($artist->id, $values["artists"])) selected @endif>
                                        {{$artist->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('artists')
                        <div class="notification is-danger" id="artists-error">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-link">@if(isset($comic)) Editar @else Añadir @endif</button>
                        </div>
                    </div>
                </form>
@endsection
